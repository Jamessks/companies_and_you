<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Company;

class CompanyPolicy
{
    public function manage(User $user, Company $company)
    {
        return $user->id === $company->user_id;
    }
}
