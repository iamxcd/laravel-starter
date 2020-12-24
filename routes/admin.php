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


    Route::apiResource('adminuser', AdminUserController::class);
    Route::apiResource('role', AdminRoleController::class);
    Route::apiResource('permission', AdminPermissionController::class);

    /**
     * 文件上传
     */
    Route::post('upload', [CommonController::class, 'upload'])->name('upload');
});
