<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_roles')->delete();
        
        \DB::table('admin_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '超级管理员',
                'tag' => 'admin',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:27:49',
                'updated_at' => '2021-01-05 10:27:49',
            ),
        ));
        
        
    }
}