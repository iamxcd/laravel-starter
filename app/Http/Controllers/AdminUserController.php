<?php

namespace App\Http\Controllers;

use App\Models\AdminUser as Model;
use App\Http\Requests\AdminUserRequest;
use Iamxcd\LaravelCRUD\Traits\HasCrud;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    use HasCrud;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->request = app(AdminUserRequest::class);
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
            "roles" => ['test'], // 占位
            "name" => $user->name,
            "avatar" => $user->avatar,
            "introduction" =>  $user->introduction,
        ], '获取成功');
    }
}
