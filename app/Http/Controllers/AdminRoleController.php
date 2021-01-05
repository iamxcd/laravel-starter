<?php

namespace App\Http\Controllers;

use App\Models\AdminRole as Model;
use App\Http\Requests\AdminRoleRequest;
use Iamxcd\LaravelCRUD\Traits\HasCrud;
use Iamxcd\LaravelCRUD\Traits\HasOption;
use Illuminate\Support\Facades\Artisan;

class AdminRoleController extends Controller
{
    use HasCrud, HasOption;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->request = app(AdminRoleRequest::class);
        $this->filterableFields = ['name', 'tag'];
    }

    public function rolePermission($role_id)
    {
        $role = $this->model::query()->findOrFail($role_id);
        $permissions = $role->permissions()->pluck('id');
        return  $this->response(['permissions' => $permissions], '获取成功');
    }


    public function assignPermission()
    {
        $data = $this->request->validated();
        $role = $this->model::query()->find($data['role_id']);
        $role->assignPermission($data['permission_ids']);
        // 清理缓存
        Artisan::call('cache:clear');
        return $this->responseMessage('授权成功');
    }
}
