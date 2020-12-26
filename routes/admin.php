<?php

use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AdminUserController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('me', [AdminUserController::class, 'me'])->name('me');
    Route::put('me', [AdminUserController::class, 'updateProfile'])->name('updateProfile');
    Route::put('update-pwd', [AdminUserController::class, 'updatePwd'])->name('updatePwd');
    Route::post('logout', [AdminUserController::class, 'logout'])->name('logout');
    Route::post('assign-role', [AdminUserController::class, 'assignRole'])->name('assignRole');

    Route::apiResource('adminuser', AdminUserController::class);
    Route::apiResource('role', AdminRoleController::class);
    Route::apiResource('permission', AdminPermissionController::class);
    Route::get('user/{id}/roles', [AdminUserController::class, 'userRoles'])->name('userRoles');

    Route::get('/option/roles', [AdminRoleController::class, 'option'])->name('options.roles');


    /**
     * 文件上传
     */
    Route::post('upload', [CommonController::class, 'upload'])->name('upload');
});
