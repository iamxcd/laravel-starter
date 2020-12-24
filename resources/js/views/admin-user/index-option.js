import tableConfig from '@/avuejs/table-config'
import { uploadUrl } from "@/api/base.js";
export default (self) => {
    console.log(uploadUrl())
    return {
        ...tableConfig(),
        index: false,
        column: [
            {
                label: 'ID',
                prop: 'id',
                display: false
            },
            {
                label: '姓名',
                prop: 'name',
                rules: [{
                    required: true,
                    message: "请输入姓名",
                    trigger: "blur"
                }]
            },
            {
                label: '用户名',
                prop: 'username',
                tip: '用户名用于登录',
                tipPlacement: 'left',
                rules: [{
                    required: true,
                    message: "请输入用户名",
                    trigger: "blur"
                }]
            },
            {
                label: '手机',
                prop: 'phone'
            },
            {
                label: '简介',
                prop: 'introduction',
                type: "textarea",
                span: 24
            },
            {
                label: '头像',
                prop: 'avatar',
                type: 'upload',
                action: uploadUrl(),
                listType: 'picture-img',
            },
            {
                label: '创建时间',
                prop: 'created_at',
                display: false
            },
            {
                label: '修改时间',
                prop: 'updated_at',
                display: false
            },
        ]
    }
}