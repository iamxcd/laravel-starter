<?php

namespace App\Http\Controllers;

use App\Models\AdminUser as Model;
use App\Http\Requests\AdminUserRequest;
use App\Models\User;
use Iamxcd\LaravelCRUD\Traits\HasCrud;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    use HasCrud;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->request = app(AdminUserRequest::class);
        $this->filterableFields = ['name', 'phone'];
    }

    public function login()
    {
        $data = $this->request->validated();

        $user = $this->model::query()
            ->where('username', $data['username'])
            ->first();

        if (is_null($user) || !Hash::check($data['password'], $user->password)) {
            return $this->responseError('账户或密码不正确');
        }

        return $this->response([
            'token' => $user->createToken($user->id)->plainTextToken
        ], '登录成功');
    }

    public function me()
    {
        $user = Auth::user();
        return $this->response([
            "roles" => $user->allRoles(),
            "permissions" => $user->allPermission(),
            "info" => $user
        ], '获取成功');
    }

    public function updateProfile()
    {
        $request = $this->request;
        $data = $request->validated();
        $model = Auth::user();
        $model->update($data);

        return $this->responseMessage('更新成功');
    }

    public function updatePwd()
    {
        $request = $this->request;
        $data = $request->validated();


        $user = Auth::user();

        if (!Hash::check($data['original_pwd'], $user->password)) {
            return $this->responseError('原密码不正确');
        }

        $user->password = bcrypt($data['password']);
        $user->save();

        return $this->responseMessage('密码修改成功');
    }

    public function logout()
    {
        $token = Auth::user()->currentAccessToken();
        $token->delete();
        return $this->responseMessage('退出成功');
    }

    public function userRoles($user_id)
    {
        $user = $this->model::query()->findOrFail($user_id);
        $roles = $user->roles()->pluck('id');
        return  $this->response(['roles' => $roles], '获取成功');
    }

    public function assignRole()
    {
        $data = $this->request->validated();
        $user = $this->model::query()->find($data['user_id']);
        $user->assignRole($data['role_ids']);

        // 清理缓存
        Artisan::call('cache:clear');
        return $this->responseMessage('分配角色成功');
    }
}
