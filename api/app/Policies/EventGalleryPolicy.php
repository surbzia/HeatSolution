<?php

namespace App\Policies;

use App\Models\EventGallery;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventGalleryPolicy
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
        return optional($user->permissions()->where('permission_id',69)->first())->id>0;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EventGallery  $eventGallery
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, EventGallery $eventGallery)
    {
        return optional($user->permissions()->where('permission_id',72)->first())->id>0;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return optional($user->permissions()->where('permission_id',70)->first())->id>0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EventGallery  $eventGallery
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, EventGallery $eventGallery)
    {
        return optional($user->permissions()->where('permission_id',71)->first())->id>0;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EventGallery  $eventGallery
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, EventGallery $eventGallery)
    {
        return optional($user->permissions()->where('permission_id',73)->first())->id>0;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EventGallery  $eventGallery
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, EventGallery $eventGallery)
    {
        return optional($user->permissions()->where('permission_id',73)->first())->id>0;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\EventGallery  $eventGallery
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, EventGallery $eventGallery)
    {
        return optional($user->permissions()->where('permission_id',73)->first())->id>0;
    }
}
