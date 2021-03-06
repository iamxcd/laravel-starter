<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommonRequest extends FormRequest
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

    private function uploadRule()
    {
        $rule = [
            'file' => 'required|file'
        ];

        return $rule;
    }

    public function attributes()
    {
        return [
            'file' => 'file'
        ];
    }

    // 常用验证方法 https://learnku.com/docs/laravel/5.8/validation/3899#rule-accepted
}
