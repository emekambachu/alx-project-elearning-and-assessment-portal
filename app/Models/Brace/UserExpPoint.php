<?php

namespace App\Models\Brace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExpPoint extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'title',
      'points'
    ];
}
