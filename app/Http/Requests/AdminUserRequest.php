<?php

namespace App\Http\Requests;

use Iamxcd\LaravelCRUD\Traits\HasOverrideFailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
{
    /**
     * 用户是否有权限请求
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 精确到控制器方法的验证
     *
     * @return array
     */
    public function rules()
    {
        $actionMethod = request()->route()->getActionMethod();
        $ruleMethod = $actionMethod . 'Rule';
        if (method_exists($this, $ruleMethod)) {
            return $this->{$ruleMethod}();
        }

        return [];
    }

    private function storeRule()
    {
        $rule = [
            'name' => 'string|required',
            'username' => 'string|required|unique:admin_users',
            'phone' => 'string|nullable',
            'introduction' => 'string|nullable',
            'avatar' => 'string|nullable'
        ];

        return $rule;
    }

    private function updateRule()
    {
        $rule = [
            'name' => 'string',
            'username' => 'string',
            'phone' => 'string|nullable',
            'introduction' => 'string|nullable',
            'avatar' => 'string|nullable'
        ];

        return $rule;
    }

    private function updateProfileRule()
    {
        $rule = [
            'name' => 'string',
            'phone' => 'string|nullable',
            'introduction' => 'string|nullable',
            'avatar' => 'string|nullable'
        ];

        return $rule;
    }

    public function updatePwdRule()
    {
        return [
            'original_pwd' => 'required|string',
            'password' => 'required|string'
        ];
    }


    public function loginRule()
    {
        return [
            'username' => 'string|required',
            'password' => 'string|required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '姓名',
            'username' => '登录用户名',
            'phone' => '手机号码',
            'introduction' => '个人简介',
            'avatar' => '头像',
            'password' => '密码',
            'original_pwd' => '原密码'
        ];
    }

    // 常用验证方法 https://learnku.com/docs/laravel/5.8/validation/3899#rule-accepted
}
