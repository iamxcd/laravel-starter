<?php

namespace App\Http\Requests;

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
            #DummyRule
        ];

        return $rule;
    }

    private function updateRule()
    {
        $rule = [
            #DummyRule
        ];

        return $rule;
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
            'username' => '用户名',
            'password' => '密码',
        ];
    }

    // 常用验证方法 https://learnku.com/docs/laravel/5.8/validation/3899#rule-accepted
}
