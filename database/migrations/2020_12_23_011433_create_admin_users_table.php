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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
