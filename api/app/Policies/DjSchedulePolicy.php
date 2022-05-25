<?php

namespace App\Policies;

use App\Models\DjSchedule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DjSchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return optional($user->permissions()->where('permission_id',108)->first())->id>0;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DjSchedule  $djSchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DjSchedule $djSchedule)
    {
        return optional($user->permissions()->where('permission_id',109)->first())->id>0;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return optional($user->permissions()->where('permission_id',110)->first())->id>0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DjSchedule  $djSchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DjSchedule $djSchedule)
    {
        return optional($user->permissions()->where('permission_id',111)->first())->id>0;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DjSchedule  $djSchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DjSchedule $djSchedule)
    {
        return optional($user->permissions()->where('permission_id',112)->first())->id>0;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DjSchedule  $djSchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DjSchedule $djSchedule)
    {
        return optional($user->permissions()->where('permission_id',112)->first())->id>0;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DjSchedule  $djSchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DjSchedule $djSchedule)
    {
        return optional($user->permissions()->where('permission_id',112)->first())->id>0;
    }
}
