<?php

namespace App\Models\Learning\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticAnswer extends Model
{
    use HasFactory;

    public $table = 'diagnostic_answers';

    protected $fillable = [
        'user_id',
        'question_id',
        'question',
        'option_answer',
        'other_answer'
    ];

    // protected $appends = ['option_answer'];

    public function getOptionAnswerAttribute($option_answer){
        return explode('|', $option_answer);
    }

    public function setOptionAnswerAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['option_answer'] = implode('|', $value);
        } else {
            $this->attributes['option_answer'] = $value;
        }
        
    }

    public function getOtherAnswerAttribute($other_answer){
        return explode('|', $other_answer);
    }

    public function setOtherAnswerAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['other_answer'] = implode('|', $value);
        } else {
            $this->attributes['other_answer'] = $value;
        }
        
    }
}
