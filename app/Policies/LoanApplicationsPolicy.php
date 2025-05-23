<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LoanApplications;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoanApplicationsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the loanApplications can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allloanapplications');
    }

    /**
     * Determine whether the loanApplications can view the model.
     */
    public function view(User $user, LoanApplications $model): bool
    {
        return $user->hasPermissionTo('view allloanapplications');
    }

    /**
     * Determine whether the loanApplications can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allloanapplications');
    }

    /**
     * Determine whether the loanApplications can update the model.
     */
    public function update(User $user, LoanApplications $model): bool
    {
        return $user->hasPermissionTo('update allloanapplications');
    }

    /**
     * Determine whether the loanApplications can delete the model.
     */
    public function delete(User $user, LoanApplications $model): bool
    {
        return $user->hasPermissionTo('delete allloanapplications');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allloanapplications');
    }

    /**
     * Determine whether the loanApplications can restore the model.
     */
    public function restore(User $user, LoanApplications $model): bool
    {
        return false;
    }

    /**
     * Determine whether the loanApplications can permanently delete the model.
     */
    public function forceDelete(User $user, LoanApplications $model): bool
    {
        return false;
    }
}
