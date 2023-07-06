<?php

namespace App\Services\User;

use App\Models\Brace\ApplicationBusiness;

class CompanyService
{
    public function business(): ApplicationBusiness
    {
        return new ApplicationBusiness();
    }

    public function businessWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->business()->with('user');
    }
}
