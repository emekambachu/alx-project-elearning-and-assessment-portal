<?php

namespace App\Models\Admin;

use App\Models\Department\AdminDepartment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected string $guard = 'admin';
    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'password',
      'role',
      'admin_department_id',
      'position',
      'last_login',
    ];

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AdminDepartment::class, 'admin_department_id', 'id');
    }
}
