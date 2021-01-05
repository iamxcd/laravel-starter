<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_permissions')->delete();
        
        \DB::table('admin_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '登陆',
                'tag' => 'login',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'me',
                'tag' => 'me',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'updateProfile',
                'tag' => 'updateProfile',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'updatePwd',
                'tag' => 'updatePwd',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'logout',
                'tag' => 'logout',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'assignRole',
                'tag' => 'assignRole',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'assignPermission',
                'tag' => 'assignPermission',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'adminuser.index',
                'tag' => 'adminuser.index',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'adminuser.store',
                'tag' => 'adminuser.store',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'adminuser.show',
                'tag' => 'adminuser.show',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'adminuser.update',
                'tag' => 'adminuser.update',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'adminuser.destroy',
                'tag' => 'adminuser.destroy',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'role.index',
                'tag' => 'role.index',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'role.store',
                'tag' => 'role.store',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'role.show',
                'tag' => 'role.show',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'role.update',
                'tag' => 'role.update',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'role.destroy',
                'tag' => 'role.destroy',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'permission.index',
                'tag' => 'permission.index',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'permission.store',
                'tag' => 'permission.store',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'permission.show',
                'tag' => 'permission.show',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'permission.update',
                'tag' => 'permission.update',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'permission.destroy',
                'tag' => 'permission.destroy',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'userRoles',
                'tag' => 'userRoles',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'rolePermission',
                'tag' => 'rolePermission',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'options.roles',
                'tag' => 'options.roles',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'options.permission',
                'tag' => 'options.permission',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'upload',
                'tag' => 'upload',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'dictionary',
                'tag' => 'dictionary',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => '菜单-系统管理',
                'tag' => 'admin.menu',
                'remark' => NULL,
                'created_at' => '2021-01-05 11:09:56',
                'updated_at' => '2021-01-05 11:10:24',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => '菜单-人员管理',
                'tag' => 'adminuser.menu',
                'remark' => NULL,
                'created_at' => '2021-01-05 11:11:47',
                'updated_at' => '2021-01-05 11:11:47',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => '菜单-角色',
                'tag' => 'role.menu',
                'remark' => NULL,
                'created_at' => '2021-01-05 11:12:44',
                'updated_at' => '2021-01-05 11:12:44',
            ),
        ));
        
        
    }
}