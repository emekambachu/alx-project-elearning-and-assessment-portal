<?php

namespace App\Services\Brace;

use App\Exports\Admin\BraceApplication\AdminBraceApplicationExport;
use App\Exports\Admin\DiagnosticTool\AdminDiagnosticStatusExport;
use App\Http\Resources\Application\BraceApplicationSearchResource;
use App\Http\Resources\DiagnosticTool\DiagnosticToolStatusResource;
use App\Models\Learning\Course\DiagnosticTools;
use App\Models\Learning\Course\DiagnosticAnswer;
use App\Models\Learning\Course\UserDiagnosticStatus;
use App\Models\Brace\User;
use App\Services\Location\CountryService;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\PersonalAccessToken;
use Maatwebsite\Excel\Facades\Excel;

class DiagnosticToolService
{
    protected CountryService $country;
    public function __construct(
        CountryService $country
    ){
        $this->country = $country;
    }

    public function braceUser(): User
    {
        return new User;
    }

    public function userWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->braceUser()->with('business', 'question', 'country', 'country_residence');
    }

    public function userDiagnosticStatus(): UserDiagnosticStatus
    {
        return new UserDiagnosticStatus();
    }

    public function userDiagnosticStatusWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->userDiagnosticStatus()->with('user');
    }

    public function fetchDiagnosticTool(): \Illuminate\Support\Collection
    {
        $total_count = DiagnosticTools::count();
        $fetch_questions = DiagnosticTools::get();

        $collection = collect(['fetch_questions' => $fetch_questions]);
        return $collection->merge(['total_count' => $total_count]);
    }

    public function fetchOneDiagnosticTool($id) {
        return DiagnosticTools::where('id', $id)->first();
    }

    public function editOneDiagnosticTool($request, $id) {
        $fetch_questions = DiagnosticTools::where('id', $id)->first();
        $fetch_questions->update([
            'question_formate' => $request->question_formate,
            'question' => $request->question,
            'options' => $request->options,
            'input_text' => $request->input_text,
            'is_condition' => $request->is_condition,
            'is_country' => $request->is_country,
            'condition' => $request->condition,
            'condition_value' => $request->condition_value,
        ]);
    }

    public function deleteOneDiagnosticTool($id) {
        $fetch_questions = DiagnosticTools::where('id', $id)->first();
        $fetch_questions->delete();
    }

    public function createQuestions($request) {
        // return $request->options;
        $input = [
            'question_formate' => $request->question_formate,
            'question' => $request->question,
            'options' => $request->options,
            // 'options' => implode('|', $request->options),
            'input_text' => $request->input_text,
            'is_condition' => $request->is_condition,
            'is_country' => $request->is_country,
            'condition' => $request->condition,
            'condition_value' => $request->condition_value,
        ];

        if($request->has('id')) {
            return DiagnosticTools::where('id', $request->id)->update($input);
        }else {
            return DiagnosticTools::create($input);
        }
    }

    public function add_user_answers($request) {
        $user = PersonalAccessToken::findToken($request->token)->tokenable;
        // logger($user);
        // $user = $request->user();
        return DiagnosticAnswer::create([
            'user_id' => $user->id,
            'question_id' => $request->question_id,
            'question' => $request->question,
            'option_answer' => $request->option_answer,
            'other_answer' => $request->other_answer,
        ]);
    }

    public function fetch_user_answers($request) {
        $user = $request->user();
        return DiagnosticAnswer::where('user_id', $user->id)->get();
    }

    public function fetch_user_answers_by_id($id) {
        return DiagnosticAnswer::where('user_id', $id)->get();
    }

    public function fetch_user_answers_by_email($request) {
        $user = $request->user();
        return DiagnosticAnswer::where('email', $user->email)->get();
    }

    public function fetch_user_answers_status($request): array
    {
        $user = $request->user();
        $answer_status = UserDiagnosticStatus::where('user_id', $user->id)->first();
        return [
            'data' => $answer_status
        ];
    }

    public function create_or_update_answer_status($request) {
        $user = $request->user();

        return UserDiagnosticStatus::updateOrCreate(
            ['user_id' => $user->id],
            [
                'is_completed' => $request->is_completed,
                'current_question_id' => $request->current_question_id
            ]
        );
    }
    // public function create_or_update_answer_status($request) {
    //     $user = $request->user();

    //     return UserDiagnosticStatus::updateOrCreate(
    //         ['user_id' => $user->id],
    //         ['is_completed' => $request->is_completed, 'current_question_id' => $request->current_question_id]
    //     );
    // }

    public function userCompletedDiagnostic($userId){
        return $this->userDiagnosticStatus()->where([
            ['user_id', $userId],
            ['is_completed', 1],
        ])->first();
    }

    public function searchDiagnostic($request): array
    {
        $input = $request->all();
        $request->session()->forget(['search_values', 'search_inputs']);

        $searchValues = [];
        foreach($input as $key => $value){
            if($key !== "page" && !empty($value)){
                if($key === "status" && $value === "completed"){
                    $searchValues[$key] = 'Completed diagnostic tool';
                }elseif($key === "status" && $value === "started"){
                    $searchValues[$key] = 'Started and pending';
                }else{
                    $searchValues[$key] = $value;
                }
            }
        }

        $request->session()->put('search_values', $searchValues);
        $request->session()->put('search_inputs', $input);

        $users = $this->userDiagnosticStatusWithRelations()->leftjoin(
            'users',
            'diagnostic_answers_status.user_id', '=', 'users.id'

        )->leftjoin(
            'application_businesses',
            'diagnostic_answers_status.user_id', '=', 'application_businesses.user_id'

        )->select(
            'users.*',
            'diagnostic_answers_status.*',
            'users.id AS user_id',
            'application_businesses.id AS business_id',
            'diagnostic_answers_status.id AS diagnostic_status_id',
            'diagnostic_answers_status.updated_at AS diagnostic_status_updated_at',
            'application_businesses.updated_at AS business_updated_at',

        )->where(function($query) use ($input){
            $query->when(!empty($input['term']), static function($q) use($input){
                $q->where('users.first_name', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('users.last_name', 'like' , '%'. $input['term'] .'%')
                    ->orWhere('users.email', 'like' , '%'. $input['term'] .'%');
            });

        })->when(!empty($input['status']), static function ($q) use($input){
            if($input['status'] === "completed"){
                return $q->where('diagnostic_answers_status.is_completed', 1);
            }
            if($input['status'] === "started"){
                return $q->where('diagnostic_answers_status.is_completed', 0);
            }
            return null;
        })->paginate(12);

        // if result exists return results, else return empty array
        if($users->total() > 0){
            return [
                'success' => true,
                'users' => DiagnosticToolStatusResource::collection($users)->response()->getData(true),
                'total' => $users->total(),
                'search_values' => Session::get('search_values')
            ];
        }

        return [
            'success' => true,
            'users' => [],
            'total' => 0,
            'search_values' => Session::get('search_values')
        ];
    }

    public function exportDiagnostic($form): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        // pass form inputs from vue to controller via url and json object string
        // Convert json object string to array
        $input = json_decode($form, true);
        $users = $this->userDiagnosticStatusWithRelations();

        return Excel::download(new AdminDiagnosticStatusExport($input, $users), 'export-diagnostic-users.xlsx');
    }
}
