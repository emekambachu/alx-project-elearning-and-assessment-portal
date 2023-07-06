<?php

namespace App\Exports\Admin\DiagnosticTool;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AdminDiagnosticStatusExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    protected $input;
    protected $users;
    public function __construct($input, $users){
        // passed from ExportDiagnosticUserService
        // assign this-> variables to arrays passed from controller method
        $this->input = $input;
        $this->users = $users;
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

        $users = $this->users->leftjoin(
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

        })->get();

        return $users;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Mobile',
            'Gender',
            'Business Name',
            'Business Email',
            'Registered Business',
            'Status'
        ];
    }

    public function map($users): array
    {
        return [
            $users->first_name.' '.$users->last_name,
            $users->email,
            $users->mobile,
            $users->gender,
            $users->business_name,
            $users->business_email,
            $users->business_registered === 1 ? 'Registered Business' : 'Unregistered Business',
            $users->is_completed === 1 ? 'Completed' : 'Started and Pending',
        ];
    }
}
