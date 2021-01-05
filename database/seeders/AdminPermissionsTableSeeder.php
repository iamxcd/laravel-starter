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


        \DB::table('admin_权限s')->delete();

        \DB::table('admin_权限s')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => '登陆',
                'tag' => 'login',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => '我的信息',
                'tag' => 'me',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 16:24:30',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => '修改我的资料',
                'tag' => 'updateProfile',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 16:24:50',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => '更新密码',
                'tag' => 'updatePwd',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 16:25:04',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => '退出',
                'tag' => 'logout',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 16:25:12',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => '分配角色',
                'tag' => 'assignRole',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 16:25:23',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => '分配权限',
                'tag' => 'assignPermission',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 16:25:46',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => '人员管理.列表',
                'tag' => 'adminuser.index',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            8 =>
            array(
                'id' => 9,
                'name' => '人员管理.新增',
                'tag' => 'adminuser.store',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            9 =>
            array(
                'id' => 10,
                'name' => '人员管理.详情',
                'tag' => 'adminuser.show',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            10 =>
            array(
                'id' => 11,
                'name' => '人员管理.修改',
                'tag' => 'adminuser.update',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            11 =>
            array(
                'id' => 12,
                'name' => '人员管理.删除',
                'tag' => 'adminuser.destroy',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'role.列表',
                'tag' => 'role.index',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'role.新增',
                'tag' => 'role.store',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'role.详情',
                'tag' => 'role.show',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            15 =>
            array(
                'id' => 16,
                'name' => 'role.修改',
                'tag' => 'role.update',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            16 =>
            array(
                'id' => 17,
                'name' => 'role.删除',
                'tag' => 'role.destroy',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            17 =>
            array(
                'id' => 18,
                'name' => '权限.列表',
                'tag' => 'permission.index',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            18 =>
            array(
                'id' => 19,
                'name' => '权限.新增',
                'tag' => 'permission.store',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            19 =>
            array(
                'id' => 20,
                'name' => '权限.详情',
                'tag' => 'permission.show',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            20 =>
            array(
                'id' => 21,
                'name' => '权限.修改',
                'tag' => 'permission.show',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            21 =>
            array(
                'id' => 22,
                'name' => '权限.删除',
                'tag' => 'permission.destroy',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            22 =>
            array(
                'id' => 23,
                'name' => '获取用户角色',
                'tag' => 'userRoles',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            23 =>
            array(
                'id' => 24,
                'name' => '获取角色权限',
                'tag' => 'userRoles',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            24 =>
            array(
                'id' => 25,
                'name' => '字典.角色',
                'tag' => 'rolePermission',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            25 =>
            array(
                'id' => 26,
                'name' => '字典.权限',
                'tag' => 'options.permission',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            26 =>
            array(
                'id' => 27,
                'name' => '上传',
                'tag' => 'upload',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            27 =>
            array(
                'id' => 28,
                'name' => '字典',
                'tag' => 'dictionary',
                'remark' => NULL,
                'created_at' => '2021-01-05 10:18:35',
                'updated_at' => '2021-01-05 10:18:35',
            ),
            28 =>
            array(
                'id' => 29,
                'name' => '菜单-系统管理',
                'tag' => 'admin.menu',
                'remark' => NULL,
                'created_at' => '2021-01-05 11:09:56',
                'updated_at' => '2021-01-05 11:10:24',
            ),
            29 =>
            array(
                'id' => 30,
                'name' => '菜单-人员管理',
                'tag' => 'adminuser.menu',
                'remark' => NULL,
                'created_at' => '2021-01-05 11:11:47',
                'updated_at' => '2021-01-05 11:11:47',
            ),
            30 =>
            array(
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
