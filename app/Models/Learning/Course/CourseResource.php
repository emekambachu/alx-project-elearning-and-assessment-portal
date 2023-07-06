<?php

namespace App\Models\Learning\Course;

use App\Models\Learning\Module\BraceModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'brace_course_id',
        'brace_module_id',
        'title',
        'url',
        'document',
        'document_path'
    ];

    public function module(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceModule::class, 'brace_module_id', 'id');
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceCourse::class, 'brace_course_id', 'id');
    }
}
