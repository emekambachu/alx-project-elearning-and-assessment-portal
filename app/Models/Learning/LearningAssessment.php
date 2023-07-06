<?php

namespace App\Models\Learning;

use App\Models\Brace\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningAssessment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'score',
        'percent',
        'status',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
