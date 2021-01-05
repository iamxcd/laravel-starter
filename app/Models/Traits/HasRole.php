<?php

namespace App\Models\Traits;

use App\Models\AdminRole;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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

    public function allPermission()
    {
        $key = md5("user." . $this->id . '.allPermission');
        $tags = Cache::get($key, false);
        if ($tags === false) {
            $role_ids = $this->roles()->pluck('id')->toArray();
            $permission_ids =  DB::table('admin_role_permissions')->whereIn('role_id', $role_ids)->pluck('permission_id');
            $tags = DB::table('admin_permissions')->whereIn('id', $permission_ids)->pluck('tag')->toArray();
            Cache::put($key, $tags, now()->addHour());
        }

        return $tags;
    }

    public function allRoles()
    {
        $key = md5("user." . $this->id . '.allRoles');
        $tags = Cache::get($key, false);
        if ($tags === false) {
            $role_ids = $this->roles()->pluck('id')->toArray();
            $tags = DB::table('admin_roles')->whereIn('id', $role_ids)->pluck('tag')->toArray();
            Cache::put($key, $tags, now()->addHour());
        }

        return $tags;
    }
}
