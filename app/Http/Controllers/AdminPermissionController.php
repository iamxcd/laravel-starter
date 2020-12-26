<?php

namespace App\Http\Controllers;

use App\Models\AdminPermission as Model;
use App\Http\Requests\AdminPermissionRequest;
use Iamxcd\LaravelCRUD\Traits\HasCrud;
use Iamxcd\LaravelCRUD\Traits\HasOption;

class AdminPermissionController extends Controller
{
    use HasCrud, HasOption;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->request = app(AdminPermissionRequest::class);
        $this->filterableFields = ['name', 'tag'];
    }
}
