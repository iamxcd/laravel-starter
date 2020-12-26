<?php

namespace App\Models\Traits;

use App\Models\AdminPermission;
use App\Models\AdminRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasPermission
{

    public function Permissions(): BelongsToMany
    {
        return $this->belongsToMany(AdminPermission::class, 'admin_role_permissions', 'role_id', 'permission_id');
    }

    public function assignPermission(array $permission_id)
    {
        $this->permissions()->sync($permission_id);
    }
}
