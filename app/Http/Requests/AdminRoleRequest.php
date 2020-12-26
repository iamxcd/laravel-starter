<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRoleRequest extends FormRequest
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
            'tag' => 'string|required',
            'remark' => 'string|nullable'
        ];

        return $rule;
    }

    private function updateRule()
    {
        $rule = [
            'name' => 'string',
            'tag' => 'string',
            'remark' => 'string|nullable'
        ];

        return $rule;
    }

    public function assignPermissionRule()
    {
        $rule = [
            'role_id' => 'integer|required|exists:admin_roles,id',
            'permission_ids' => 'array',
            'permission_ids.*' => 'integer|exists:admin_permissions,id',
        ];

        return $rule;
    }

    public function attributes()
    {
        return [
            'name' => '角色名称',
            'tag' => '角色标记',
            'remark' => '备注'
        ];
    }

    // 常用验证方法 https://learnku.com/docs/laravel/5.8/validation/3899#rule-accepted
}
