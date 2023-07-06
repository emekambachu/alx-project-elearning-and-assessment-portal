<?php

namespace App\Models\Learning\Course;

use App\Models\Brace\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDiscussionLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'brace_course_id',
        'course_discussion_id',
        'user_id'
    ];

    public function course(){
        $this->belongsTo(BraceCourse::class, 'brace_course_id', 'id');
    }

    public function course_discussion(){
        $this->belongsTo(CourseDiscussion::class, 'course_discussion_id', 'id');
    }

    public function user(){
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
