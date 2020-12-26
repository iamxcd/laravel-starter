<template>
  <el-dialog
    destroy-on-close
    append-to-body
    title="分配权限"
    :visible.sync="isShow"
    width="50%"
  >
    <el-transfer
      v-model="selectedPermissions"
      :props="propsOption"
      :data="data"
    ></el-transfer>

    <span slot="footer" class="dialog-footer">
      <el-button @click="onClose()">取 消</el-button>
      <el-button type="primary" @click="onSave()">确 定</el-button>
    </span>
  </el-dialog>
</template>

<script>
import { get, post } from "@/api/base.js";
export default {
  props: {
    allPermission: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      data: [],
      selectedPermissions: [],
      isShow: false,
      roleId: null,
      propsOption: {
        key: "value",
        label: "label",
        disabled: "disabled",
      },
    };
  },
  watch: {
    allPermission(val) {
      this.data = val;
    },
  },
  methods: {
    open(roleId) {
      this.roleId = roleId;
      this.getRoles(roleId);
      this.isShow = true;
    },
    onSave() {
      post("assign-permission", {
        role_id: this.roleId,
        permission_ids: this.selectedPermissions,
      }).then((res) => {
        this.$message.success(res.message);
      });
      this.isShow = false;
    },
    onClose() {
      this.isShow = false;
      this.selectedPermissions = [];
    },
    getRoles(roleId) {
      get(`role/${roleId}/permissions`).then((res) => {
        this.selectedPermissions = res.data.permissions;
      });
    },
  },
};
</script>