import tableConfig from '@/avuejs/table-config'
import { uploadUrl } from "@/api/base.js";
export default (self) => {
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
                label: '角色名称',
                prop: 'name',
                search: true,
                rules: [{
                    required: true,
                    message: "请输入角色名称",
                    trigger: "blur"
                }]
            },
            {
                label: '角色标记',
                prop: 'tag',
                search: true,
                rules: [{
                    required: true,
                    message: "请输入角色标记",
                    trigger: "blur"
                }]
            },
            {
                label: '备注信息',
                type: "textarea",
                prop: 'remark',
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