<?php

namespace App\Models\Learning\Module;

use App\Models\Learning\Course\BraceCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BraceModule extends Model
{
    use HasFactory;
    protected  $fillable = [
        'title',
        'image',
        'image_path',
        'description',
        'trainers',
        'training_methods',
        'start',
        'end',
        'sort',
        'status'
    ];

    public function courses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BraceCourse::class, 'brace_module_id', 'id')
            ->orderBy('sort', 'asc');
    }

    public function module_views(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BraceModuleView::class, 'brace_module_id', 'id')
            ->orderBy('id');
    }

    public function assessment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(BraceModuleView::class, 'brace_module_id', 'id');
    }

    public function assignments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ModuleAssignment::class, 'brace_module_id', 'id');
    }
}
