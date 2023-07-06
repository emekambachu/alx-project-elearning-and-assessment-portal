<?php

namespace App\Models\Learning\Course;

use App\Models\Learning\Module\BraceModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BraceCourse extends Model
{
    use HasFactory;
    protected  $fillable = [
        'brace_module_id',
        'title',
        'image',
        'image_path',
        'video',
        'study_timer',
        'objectives',
        'course_outline',
        'course_contents',
        'content_type',
        'trainers',
        'sort',
        'status'
    ];

    public function module(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceModule::class, 'brace_module_id', 'id');
    }

    public function course_views(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BraceCourseView::class, 'brace_course_id', 'id');
    }

    public function course_activities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BraceCourseView::class, 'brace_course_id', 'id');
    }

    public function discussions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseDiscussion::class, 'brace_course_id', 'id');
    }

    public function resources(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseResource::class, 'brace_course_id', 'id');
    }
}
