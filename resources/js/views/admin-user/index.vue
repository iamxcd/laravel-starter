<template>
  <div class="content">
    <avue-crud
      ref="crud"
      :option="option"
      :page="pagination"
      :table-loading="loading"
      @current-change="currentChange"
      @size-change="sizeChange"
      @on-load="getList"
      @row-update="rowUpdate"
      @row-save="rowSave"
      @row-del="rowDel"
      @refresh-change="refreshChange"
      @search-reset="searchReset"
      @search-change="searchChange"
      v-model="form"
      :data="tableData"
    >
      <template slot-scope="{ type, size, row }" slot="menu">
        <el-button
          icon="el-icon-check"
          :size="size"
          :type="type"
          @click="openAssignRole(row.id)"
          >分配角色</el-button
        >
      </template>
    </avue-crud>
    <AssignRole ref="AssignRole" :all-role="roles"></AssignRole>
  </div>
</template>

<script>
import indexOption from "./index-option";
import tableMixin from "@/avuejs/table-mixin";
import AssignRole from "./AssignRole";
import { get } from "@/api/base.js";

export default {
  name: "Admin",
  mixins: [tableMixin],
  components: {
    AssignRole,
  },
  data() {
    return {
      uri: "adminuser",
      roles: [],
    };
  },
  created() {
    this.getAllRoles();
  },
  computed: {
    option() {
      return indexOption(this);
    },
  },
  methods: {
    openAssignRole(userId) {
      this.$refs["AssignRole"].open(userId);
    },
    getAllRoles() {
      get("option/roles").then((res) => {
        this.roles = res.data;
      });
    },
  },
};
</script>

<style lang="scss" scoped>
.content {
  margin: 10px;
  padding: 10px;
}
</style>

