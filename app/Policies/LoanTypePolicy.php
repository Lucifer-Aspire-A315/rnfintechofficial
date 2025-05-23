<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LoanType;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoanTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the loanType can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list loantypes');
    }

    /**
     * Determine whether the loanType can view the model.
     */
    public function view(User $user, LoanType $model): bool
    {
        return $user->hasPermissionTo('view loantypes');
    }

    /**
     * Determine whether the loanType can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create loantypes');
    }

    /**
     * Determine whether the loanType can update the model.
     */
    public function update(User $user, LoanType $model): bool
    {
        return $user->hasPermissionTo('update loantypes');
    }

    /**
     * Determine whether the loanType can delete the model.
     */
    public function delete(User $user, LoanType $model): bool
    {
        return $user->hasPermissionTo('delete loantypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete loantypes');
    }

    /**
     * Determine whether the loanType can restore the model.
     */
    public function restore(User $user, LoanType $model): bool
    {
        return false;
    }

    /**
     * Determine whether the loanType can permanently delete the model.
     */
    public function forceDelete(User $user, LoanType $model): bool
    {
        return false;
    }
}
