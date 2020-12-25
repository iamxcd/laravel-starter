<?php

namespace App\Http\Controllers;

use App\Models\AdminRole as Model;
use App\Http\Requests\AdminRoleRequest;
use Iamxcd\LaravelCRUD\Traits\HasCrud;
use Iamxcd\LaravelCRUD\Traits\HasOption;

class AdminRoleController extends Controller
{
    use HasCrud, HasOption;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->request = app(AdminRoleRequest::class);
        $this->filterableFields = ['name', 'tag'];
    }
}
