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
        if (config('app.env') != 'production') {
            return $this->devSeeder();
        }
    }

    public function devSeeder()
    {
        $admin =  AdminUser::factory(50)->create()->first();
        $admin->username = 'admin';
        $admin->save();

        AdminRole::factory(20)->create();
        AdminPermission::factory(20)->create();
    }
}
