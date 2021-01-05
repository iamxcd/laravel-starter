<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('姓名');
            $table->string('username')->unique()->comment('登录用户名');
            $table->string('phone')->nullable()->unique()->comment('手机号码');
            $table->string('introduction')->nullable()->comment('个人简介');
            $table->text('avatar')->nullable()->comment('头像');
            $table->string('password')->comment('密码');

            $table->timestamps();
        });

        Schema::create('admin_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique()->comment('角色名称');
            $table->string('tag', 50)->unique()->comment('角色标记');
            $table->string('remark')->nullable()->comment('备注');
            $table->timestamps();
        });

        Schema::create('admin_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique()->comment('权限名称');
            $table->string('tag', 50)->unique()->comment('权限标签');
            $table->string('remark')->nullable()->comment('备注');
            $table->timestamps();
        });

        Schema::create('admin_role_users', function (Blueprint $table) {
            $table->integer('role_id')->comment('角色ID');
            $table->integer('user_id')->comment('用户ID');
            $table->index('role_id');
            $table->index('user_id');
            $table->index(['role_id', 'user_id']);
            $table->timestamps();
        });

        Schema::create('admin_role_permissions', function (Blueprint $table) {
            $table->integer('role_id')->comment('角色ID');
            $table->integer('permission_id')->comment('权限ID');
            $table->index('role_id');
            $table->index('permission_id');
            $table->index(['role_id', 'permission_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
        Schema::dropIfExists('admin_roles');
        Schema::dropIfExists('admin_permissions');
        Schema::dropIfExists('admin_role_users');
        Schema::dropIfExists('admin_role_permissions');
    }
}
