<?php

namespace Database\Seeders;

use App\Models\AdminPermission;
use App\Models\AdminRole;
use App\Models\AdminUser;
use Illuminate\Database\Seeder;

class AdminDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AdminRolesTableSeeder::class);
        $this->call(AdminPermissionsTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);

        if (config('app.env') != 'production') {
            AdminUser::factory(50)->create();
        }

        /**
         * 授权
         */
        $permissions = AdminPermission::query()->pluck('id')->toArray();
        $admin = AdminRole::query()->find(1);
        $admin->assignPermission($permissions);
        $user =  AdminUser::query()->find(1);
        $user->assignRole([$admin->id]);
    }
}
