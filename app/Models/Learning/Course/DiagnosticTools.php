<?php

namespace App\Models\Learning\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class DiagnosticTools extends Model
{
    use HasFactory;

    public $table = 'diagnostic_tools';

    protected $fillable = [
        'question_formate',
        'question',
        'options',
        'input_text',
        'is_condition',
        'is_country',
        'condition',
        'condition_value'
    ];

    // protected $appends = ['options'];
    

    public function getOptionsAttribute($options){
        return explode('|', $options);
    }

    public function setOptionsAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['options'] = implode('|', $value);
        } else {
            $this->attributes['options'] = $value;
        }
    }
    // protected function getAnswerOptions(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => explode(',', $value),
    //     );
    // }
}
