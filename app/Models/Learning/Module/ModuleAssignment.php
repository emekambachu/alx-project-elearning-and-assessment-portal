<?php

namespace App\Models\Learning\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleAssignment extends Model
{
    use HasFactory;
    protected $fillable = [
      'brace_module_id',
      'title',
      'description',
    ];

    public function module(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BraceModule::class, 'brace_module_id', 'id');
    }
}
