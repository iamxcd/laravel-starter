<?php

use App\Http\Controllers\AdminPermissionController;
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

Route::group(['middleware' => ['auth:sanctum', 'verify.api-permission']], function () {
    Route::get('me', [AdminUserController::class, 'me'])->name('me');
    Route::put('me', [AdminUserController::class, 'updateProfile'])->name('updateProfile');
    Route::put('update-pwd', [AdminUserController::class, 'updatePwd'])->name('updatePwd');
    Route::post('logout', [AdminUserController::class, 'logout'])->name('logout');

    Route::post('assign-role', [AdminUserController::class, 'assignRole'])->name('assignRole');
    Route::post('assign-permission', [AdminRoleController::class, 'assignPermission'])->name('assignPermission');

    Route::apiResource('adminuser', AdminUserController::class);
    Route::apiResource('role', AdminRoleController::class);
    Route::apiResource('permission', AdminPermissionController::class);

    Route::get('user/{id}/roles', [AdminUserController::class, 'userRoles'])->name('userRoles');
    Route::get('role/{id}/permissions', [AdminRoleController::class, 'rolePermission'])->name('rolePermission');

    Route::get('/option/roles', [AdminRoleController::class, 'option'])->name('options.roles');
    Route::get('/option/permission', [AdminPermissionController::class, 'option'])->name('options.permission');


    /**
     * 文件上传
     */
    Route::post('upload', [CommonController::class, 'upload'])->name('upload');
    /**
     * 字典数据
     */
    Route::get('dictionary', [CommonController::class, 'dictionary'])->name('dictionary');
});
