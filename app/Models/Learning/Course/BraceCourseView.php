<?php

namespace App\Models\Learning\Course;

use App\Models\Brace\User;
use App\Models\Learning\Module\BraceModule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BraceCourseView extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'brace_module_id',
        'brace_course_id',
        'points',
        'status',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceCourse::class, 'brace_course_id', 'id');
    }

    public function module(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceModule::class, 'brace_module_id', 'id');
    }
}
