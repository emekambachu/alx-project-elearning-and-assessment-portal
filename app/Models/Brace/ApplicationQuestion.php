<?php

namespace App\Models\Brace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'participated_previous_program',
      'participated_climate_program',
      'expectations_from_program',
      'impact_on_business',
      'how_did_you_hear',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
