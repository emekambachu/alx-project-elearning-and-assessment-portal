<?php

namespace App\Exports\Admin\BraceApplication;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AdminBraceApplicationExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    protected $input;
    protected $applications;
    public function __construct($input, $applications){
        // passed from ExportDiagnosticUserService
        // assign this-> variables to arrays passed from controller method
        $this->input = $input;
        $this->applications = $applications;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): \Illuminate\Support\Collection
    {
        $input = [];
        // if $this->input array has items, iterate
        // else ignore it
        if(count($this->input) > 0){
            foreach($this->input as $key => $value){
                $input[$key] = $value;
            }
        }

        $applications = $this->applications->leftjoin(
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
            return $q->where('users.date_of_birth', '>=', $input['dob_start']);

        })->when(!empty($input['dob_end']), static function ($q) use($input){
            return $q->where('users.date_of_birth', '<=', $input['dob_end']);

        })->get();

        return $applications;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Mobile',
            'Gender',
            'Education',
            'Date of Birth',
            'Country',
            'Country Residence',

            'Business Name',
            'Business Email',
            'Business Country',
            'Registered Business',
            'Website',
            'Linkedin',
            'Instagram',
            'Twitter',
            'Facebook',
            'Year of Operation',
            'Type of Business',
            'Agribusiness Sector',
            'Value Chain Operation',
            'Business Stage',
            'Business Description',
            'Number of Employees',

            'Have you participated in any ALX | E-learning and Assessment Portal programs before?',
            'Have you participated in any climate-related training/programs?',
            'What are your expectations from the program?',
            'How would the program impact your business?',
            'How did you hear about this program?',

            'Selected'
        ];
    }

    public function map($applications): array
    {
        return [
            $applications->first_name.' '.$applications->last_name,
            $applications->email,
            $applications->mobile,
            $applications->gender,
            $applications->education,
            $applications->date_of_birth,
            $applications->country_name,
            $applications->country_residence_name,

            $applications->business_name,
            $applications->business_email,
            $applications->business_country_name,
            $applications->business_registered === 1 ? 'Registered Business' : 'Unregistered Business',
            $applications->website,
            $applications->linkedin,
            $applications->instagram,
            $applications->twitter,
            $applications->facebook,
            $applications->year_of_operation,
            $applications->type_of_business,
            $applications->agribusiness_sector,
            $applications->value_chain_operation,
            $applications->business_stage,
            $applications->business_description,
            $applications->number_of_employees,

            $applications->participated_previous_program,
            $applications->participated_climate_program,
            $applications->expectations_from_program,
            $applications->impact_on_business,
            $applications->how_did_you_hear,
            $applications->selected === 1 ? 'Selected' : '',
        ];
    }
}
