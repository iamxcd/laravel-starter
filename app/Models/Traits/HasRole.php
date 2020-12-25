<?php

namespace App\Models\Traits;

use App\Models\AdminRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRole
{

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(AdminRole::class, 'admin_role_users', 'user_id', 'role_id');
    }

    public function assignRole(array $role)
    {
        $this->roles()->sync($role);
    }
}
