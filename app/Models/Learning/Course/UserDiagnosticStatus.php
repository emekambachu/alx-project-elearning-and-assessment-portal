<?php

namespace App\Models\Learning\Course;

use App\Models\Brace\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDiagnosticStatus extends Model
{
    use HasFactory;
    public $table = 'diagnostic_answers_status';

    protected $fillable = [
        'user_id',
        'question_id',
        'current_question_id',
        'is_completed',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
