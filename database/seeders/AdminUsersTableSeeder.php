<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admin_users')->delete();

        AdminUser::query()->create(
            [
                'name' => '超级管理员',
                'username' => 'admin',
                'introduction' => '超级管理员',
                'avatar' =>  url('/static/images/default_avatar.jpeg')
            ]
        );
    }
}
