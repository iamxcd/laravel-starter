<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPermissionRequest extends FormRequest
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
            'name' => 'required|string',
            'tag' => 'required|string',
            'remark' => 'nullable|string'
        ];

        return $rule;
    }

    private function updateRule()
    {
        $rule = [
            'name' => 'required|string',
            'tag' => 'required|string',
            'remark' => 'nullable|string'
        ];

        return $rule;
    }

    public function attributes()
    {
        return [
            'name' => '权限名称',
            'tag' => '权限标签',
            'remark' => '备注'
        ];
    }

    // 常用验证方法 https://learnku.com/docs/laravel/5.8/validation/3899#rule-accepted
}
