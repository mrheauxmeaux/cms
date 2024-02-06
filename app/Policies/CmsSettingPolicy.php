<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CmsSetting;
use Illuminate\Auth\Access\HandlesAuthorization;

class CmsSettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_orion::cms::setting');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CmsSetting  $cmsSetting
     * @return bool
     */
    public function view(User $user, CmsSetting $cmsSetting): bool
    {
        return $user->can('view_orion::cms::setting');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_orion::cms::setting');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CmsSetting  $cmsSetting
     * @return bool
     */
    public function update(User $user, CmsSetting $cmsSetting): bool
    {
        return $user->can('update_orion::cms::setting');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CmsSetting  $cmsSetting
     * @return bool
     */
    public function delete(User $user, CmsSetting $cmsSetting): bool
    {
        return $user->can('delete_orion::cms::setting');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_orion::cms::setting');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CmsSetting  $cmsSetting
     * @return bool
     */
    public function forceDelete(User $user, CmsSetting $cmsSetting): bool
    {
        return $user->can('force_delete_orion::cms::setting');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_orion::cms::setting');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CmsSetting  $cmsSetting
     * @return bool
     */
    public function restore(User $user, CmsSetting $cmsSetting): bool
    {
        return $user->can('restore_orion::cms::setting');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_orion::cms::setting');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CmsSetting  $cmsSetting
     * @return bool
     */
    public function replicate(User $user, CmsSetting $cmsSetting): bool
    {
        return $user->can('replicate_orion::cms::setting');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_orion::cms::setting');
    }

}
