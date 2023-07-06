<?php

namespace App\Models\Learning\Course;

use App\Models\Brace\ApplicationBusiness;
use App\Models\Brace\User;
use App\Models\Learning\Module\BraceModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDiscussion extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'brace_module_id',
      'brace_course_id',
      'comment_id',
      'comment',
      'type',
      'status',
    ];

    public function module(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceModule::class, 'brace_module_id', 'id');
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceCourse::class, 'brace_course_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function replies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseDiscussion::class, 'comment_id', 'id')
            ->where('type', 'reply');
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseDiscussionLike::class, 'course_discussion_id', 'id');
    }
}
