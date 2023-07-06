<?php

namespace App\Models\Learning\Module;

use App\Models\Brace\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleAssessmentAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'brace_module_id',
        'user_id',
        'module_assessment_question_id',
        'answer',
    ];

    public function module(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceModule::class, 'brace_module_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function question(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ModuleAssessmentQuestion::class, 'module_assessment_question_id', 'id');
    }
}
