<?php

namespace App\Models\Brace;

use App\Models\Location\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationBusiness extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'business_name',
        'business_email',
        'business_country_id',
        'business_registered',
        'website',
        'linkedin',
        'twitter',
        'instagram',
        'facebook',
        'year_of_operation',
        'document',
        'document_path',
        'type_of_business',
        'agribusiness_sector',
        'value_chain_operation',
        'business_stage',
        'business_description',
        'number_of_employees',
    ];

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class, 'business_country_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
