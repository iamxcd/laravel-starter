<?php

use App\Models\AdminPermission;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('getRouteName', function () {
    $names = array_keys(\Illuminate\Support\Facades\Route::getRoutes()->getRoutesByName());
    foreach ($names as $name) {
        AdminPermission::query()->create([
            'name' => $name,
            'tag' => $name
        ]);
    }
});
