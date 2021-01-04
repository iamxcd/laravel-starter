<template>
  <div class="content">
    <avue-crud
      ref="crud"
      :option="option"
      :page="pagination"
      :table-loading="loading"
      @current-change="currentChange"
      @size-change="sizeChange"
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
          @click="openAssignPermission(row.id)"
          >分配权限</el-button
        >
      </template>
    </avue-crud>
    <AssignPermission :all-permission="permission" ref="AssignPermission">
    </AssignPermission>
  </div>
</template>

<script>
import indexOption from "./index-option";
import tableMixin from "@/avuejs/table-mixin";
import AssignPermission from "./AssignPermission";
import { get } from "@/api/base.js";

export default {
  name: "Role",
  mixins: [tableMixin],
  components: {
    AssignPermission,
  },
  data() {
    return {
      uri: "role",
      permission: [],
      buildRules: {
        name: "like",
        tag: "like",
      },
    };
  },
  created() {
    this.getAllPermission();
  },
  computed: {
    option() {
      return indexOption(this);
    },
  },
  methods: {
    openAssignPermission(roleId) {
      this.$refs["AssignPermission"].open(roleId);
    },
    getAllPermission() {
      get("option/permission").then((res) => {
        this.permission = res.data;
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

