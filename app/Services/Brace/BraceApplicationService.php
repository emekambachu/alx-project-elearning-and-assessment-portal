<?php

namespace App\Services\Brace;
use App\Exports\Admin\BraceApplication\AdminBraceApplicationExport;
use App\Http\Resources\Application\BraceApplicationResource;
use App\Http\Resources\Application\BraceApplicationSearchResource;
use App\Jobs\CreateTablesAndSendEmailJob;
use App\Models\Brace\ApplicationBusiness;
use App\Models\Brace\ApplicationQuestion;
use App\Models\Brace\User;
use App\Services\Base\BaseService;
use App\Services\Base\CrudService;
use App\Services\Location\CountryService;
use DateTime;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class BraceApplicationService
{
    protected CountryService $country;
    public function __construct(
        CountryService $country
    ){
        $this->country = $country;
    }

    protected string $imagePath = 'photos/users';
    protected string $documentPath = 'documents/businesses';

    public function braceUser(): User
    {
        return new User;
    }

    public function userWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->braceUser()->with('business', 'question', 'country', 'country_residence');
    }

    public function business(): ApplicationBusiness
    {
        return new ApplicationBusiness();
    }

    public function question(): ApplicationQuestion
    {
        return new ApplicationQuestion();
    }

    public function userById($id){
        return $this->userWithRelations()->findOrFail($id);
    }

    /**
     * @throws \Exception
     */
    public function storeApplication($request): array
    {
        $inputs = $request->all();

        // Select dates in right order except time zone
        $newDate = explode(' ', $inputs['date_of_birth']);
        $inputs['date_of_birth'] = $newDate[0].' '.$newDate[1].' '.$newDate[2].' '.$newDate[3].' '.$newDate[4].' '.$newDate[5];

        // Convert new date to mysql format
        $dob = new DateTime($inputs['date_of_birth']);
        $inputs['date_of_birth'] = $dob->format('Y-m-d H:i:s');

        $inputs['business_registered'] = $inputs['business_registered'] === "1" ? 1 : 0;
        $inputs['number_of_employees'] = 'Full-time: '.$inputs['number_of_employees_full_time'].', Part-time: '.$inputs['number_of_employees_part_time'].', Casual: '.$inputs['number_of_employees_casual'];
        $inputs['participated_previous_program'] = $inputs['participated_previous_program'].', '.$inputs['participated_previous_program_yes'];
        $inputs['participated_climate_program'] = $inputs['participated_climate_program'].', '.$inputs['participated_climate_program_yes'];
        $inputs['how_did_you_hear'] = $inputs['how_did_you_hear'].', '.$inputs['how_did_you_hear_others'];

        // update status and upload files
        $inputs['document'] = CrudService::uploadAnyFile($request, $this->documentPath, 'document');
        $inputs['document_path'] = config('app.app_url').'/'.$this->documentPath.'/';

        $user = $this->braceUser()->create($inputs);
        $user = [
            'id' => $user->id,
            'name' => $user->first_name.' '.$user->last_name,
            'email' => $user->email,
        ];

        // Store company, question details and email in dispatch
        // Run dispatch in live server background with ""
        // Run dispatch on local server background which can be canceled when cli is closed with ""
        dispatch(new CreateTablesAndSendEmailJob($user, $inputs));

//        $inputs['user_id'] = $user->id;
//        $this->business()->create($inputs);
//        $this->question()->create($inputs);
//
//        $emailData = [
//            'email' => $inputs['email'],
//            'name' => $inputs['first_name'].' '.$inputs['last_name']
//        ];
//
//        try {
//            // Send email to applicant
//            BaseService::sendEmailGeneral(
//                $emailData,
//                'emails.application.notify-applicant',
//                'BRACE | Application Complete',
//                $emailData['email'],
//                $emailData['name']
//            );
//
//        } catch (\Exception $e) {
//            // If email fails, still return successful
//            return [
//                'success' => true,
//                'applicant' => $user,
//                'message' => 'Application completed',
//                'error_message' => $e->getMessage()
//            ];
//        }

        return [
            'success' => true,
            'applicant' => $user,
            'message' => 'Application completed'
        ];

    }

    public function searchApplications($request): array
    {
        $input = $request->all();
        $request->session()->forget(['search_values', 'search_inputs']);

        $searchValues = [];
        foreach($input as $key => $value){
            if($key !== "page" && !empty($value)){
                if($key === 'dob_start'){
                    $searchValues[$key] = 'After '.$value;
                }elseif($key === 'dob_end'){
                    $searchValues[$key] = 'Before '.$value;
                }elseif($key === 'application_date_start'){
                    $searchValues[$key] = 'After '.$value;
                }elseif($key === 'application_date_end'){
                    $searchValues[$key] = 'Before '.$value;
                }elseif($key == 'country_id'){
                    $searchValues[$key] = $this->country->countryById($value)->country_name;
                }else{
                    $searchValues[$key] = $value;
                }
            }
        }

        $request->session()->put('search_values', $searchValues);
        $request->session()->put('search_inputs', $input);

        $applications = $this->userWithRelations()->leftjoin(
            'application_businesses',
            'users.id', '=', 'application_businesses.user_id'
        )->leftjoin(
            'application_questions',
            'users.id', '=', 'application_questions.user_id'
        )->leftjoin(
            'countries',
            'users.country_id', '=', 'countries.id'
        )->leftjoin(
            'countries AS country_residence',
            'users.country_residence_id', '=', 'country_residence.id'
        )->leftjoin(
            'countries AS business_country',
            'application_businesses.business_country_id', '=', 'business_country.id'
        )->select(
            'users.*',
            'users.id AS user_id',
            'countries.*',
            'countries.id AS country_id',
            'country_residence.id AS country_residence_id',
            'country_residence.country_name AS country_residence_name',
            'business_country.id AS business_country_id',
            'business_country.country_name AS business_country_name',
            'application_businesses.*',
            'application_businesses.id AS application_business_id',
            'application_questions.*',
            'application_questions.id AS application_question_id',
        )->where(function($query) use ($input){
            $query->when(!empty($input['term']), static function($q) use($input){
                $q->where('users.first_name', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('users.last_name', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('users.email', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('countries.country_name', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('application_businesses.business_name', 'like' , '%'. $input['term'] .'%');
            });

        })->when(!empty($input['country_id']), static function ($q) use($input){
            return $q->where('users.country_id', $input['country_id']);

        })->when(!empty($input['dob_start']), static function ($q) use($input){
            return $q->where('users.date_of_birth', '>=', date("Y-m-d",strtotime($input['dob_start'])));

        })->when(!empty($input['dob_end']), static function ($q) use($input){
            return $q->where('users.date_of_birth', '<=', date("Y-m-d",strtotime($input['dob_end'])));

        })->when(!empty($input['application_date_start']), static function ($q) use($input){
            return $q->where('users.created_at', '>=', date("Y-m-d",strtotime($input['application_date_start'])));

        })->when(!empty($input['application_date_end']), static function ($q) use($input){
            return $q->where('users.created_at', '<=', date("Y-m-d",strtotime($input['application_date_end'])));

        })->paginate(15);

        // if result exists return results, else return empty array
        if($applications->total() > 0){
            return [
                'success' => true,
                'applications' => BraceApplicationSearchResource::collection($applications)->response()->getData(true),
                'total' => $applications->total(),
                'search_values' => Session::get('search_values')
            ];
        }

        return [
            'success' => true,
            'applications' => [],
            'total' => 0,
            'search_values' => Session::get('search_values')
        ];
    }

    public function exportApplications($form): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        // pass form inputs from vue to controller via url and json object string
        // Convert json object string to array
        $input = json_decode($form, true);
        $applications = $this->userWithRelations();

        return Excel::download(new AdminBraceApplicationExport($input, $applications), 'export-applications.xlsx');
    }

    public function selectApplicant($request): array
    {
        $selectedApplication = $this->userById($request->application_id);
        if(!$selectedApplication){
            return [
                'success' => false,
                'message' => 'Applicant does not exist',
            ];
        }

        if($selectedApplication->selected === 1){
            $selectedApplication->selected = 0;
            $message = $selectedApplication->first_name.' Has been removed';
        }else{
            $selectedApplication->selected = 1;
            $message = $selectedApplication->first_name.' Has been selected';
        }
        $selectedApplication->save();

        return [
            'success' => true,
            'total_selected' => $this->braceUser()->where('selected', 1)->count(),
            'selected' => $selectedApplication->selected,
            'message' => $message,
        ];
    }


}
