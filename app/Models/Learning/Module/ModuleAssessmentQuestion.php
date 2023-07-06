<?php

namespace App\Models\Learning\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleAssessmentQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'brace_module_id',
        'question',
        'option_one',
        'option_two',
        'option_three',
        'option_four',
        'option_five',
        'correct_answer',
    ];

    public function module(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceModule::class, 'brace_module_id', 'id');
    }

    public function answer(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ModuleAssessmentAnswer::class, 'module_assessment_question_id', 'id');
    }
}
