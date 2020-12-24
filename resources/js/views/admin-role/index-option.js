import tableConfig from '@/avuejs/table-config'
export default (self) => {
    return {
        ...tableConfig(),
        column: [
            {
                label: "名称",
                prop: "name",
                rules: [{
                    required: true,
                    message: "请输入名称",
                    trigger: "blur"
                }]
            },
            {
                label: "值(value)",
                prop: "value",
                search: true,
                rules: [{
                    required: true,
                    message: "请输入值(value)",
                    trigger: "blur"
                }]
            },
            {
                label: "参数(code)",
                prop: "code",
                rules: [{
                    required: true,
                    message: "请输入参数(code)",
                    trigger: "blur"
                }]
            }, {
                label: '备注',
                prop: 'note'
            }],
    }
}