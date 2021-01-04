import { tableDefaultData, responseDataFormat } from "@/utils/tableDataHandle";
import { getList, edit, add, del } from "@/api/base.js";
import buildQueryParams from "@/utils/build-query-params";

export default {
    data() {
        return {
            ...tableDefaultData(),
            uri: "",
            buildRules: {}
        }
    },
    created() {
        this.getDataList()
    },
    methods: {
        getDataList() {
            this.loading = true;
            getList(this.uri, {
                ...this.queryParams,
                ...this.pagination,
            }).then((res) => {
                responseDataFormat(res, this);
            });
        },
        currentChange(page) {
            this.pagination.page = page;
            this.getDataList();
        },
        sizeChange(page_size) {
            this.pagination.page = 1;
            this.pagination.page_size = page_size;
            this.getDataList();
        },
        rowSave(row, done, loading) {
            add(this.uri, row)
                .then(() => {
                    this.$message.success("新增成功");
                    done();
                    this.getDataList();
                })
                .catch(() => {
                    loading();
                });
        },
        rowUpdate(row, index, done, loading) {
            edit(this.uri, row.id, row)
                .then(() => {
                    this.$message.success("修改成功");
                    done();
                    this.getDataList();
                })
                .catch(() => {
                    loading();
                });
        },

        rowDel(row) {
            this.$confirm("此操作将永久删除, 是否继续?", "提示", {
                confirmButtonText: "确定",
                cancelButtonText: "取消",
                type: "warning",
            })
                .then(() => {
                    return del(this.uri, row.id);
                })
                .then(() => {
                    this.$message.success("删除成功");
                    this.getDataList();
                });
        },
        searchChange(params, done) {
            if (done) done();
            this.queryParams = buildQueryParams(params, this.buildRules);
            this.pagination.page = 1;
            this.getDataList();
            this.$message.success("搜索成功");
        },
        searchReset() {
            this.queryParams = {};
            this.pagination.page = 1;
            this.getDataList();
        },
        refreshChange() {
            this.getDataList();
            this.$message.success("刷新成功");
        },
    }
}