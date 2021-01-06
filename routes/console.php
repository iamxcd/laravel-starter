<?php

use App\Models\AdminPermission;
use Illuminate\Support\Facades\Artisan;


/**
 * 同步到权限表
 */
Artisan::command('sync:permission', function () {
    $names = array_keys(\Illuminate\Support\Facades\Route::getRoutes()->getRoutesByName());
    foreach ($names as $name) {
        AdminPermission::query()->firstOrCreate(['tag' => $name], ['name' => $name,]);
    }
    Artisan::call('iseed', ['tables' => 'admin_permissions'], $this->output);
});
