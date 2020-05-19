<?php

namespace App\Policies;

use App\RentalTransaction;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RentalTransactionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\RentalTransaction  $rentalTransaction
     * @return mixed
     */
    public function view(User $user, RentalTransaction $rentalTransaction)
    {
        return $user->id === $rentalTransaction->user_id || $user->role_id === 1; 
        //para maview ng specific user ung own transactions nia and kapag admin ka
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\RentalTransaction  $rentalTransaction
     * @return mixed
     */
    public function update(User $user, RentalTransaction $rentalTransaction)
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\RentalTransaction  $rentalTransaction
     * @return mixed
     */
    public function delete(User $user, RentalTransaction $rentalTransaction)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\RentalTransaction  $rentalTransaction
     * @return mixed
     */
    public function restore(User $user, RentalTransaction $rentalTransaction)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\RentalTransaction  $rentalTransaction
     * @return mixed
     */
    public function forceDelete(User $user, RentalTransaction $rentalTransaction)
    {
        //
    }
}
