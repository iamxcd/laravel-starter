<template>
  <el-dialog
    destroy-on-close
    append-to-body
    title="分配角色"
    :visible.sync="isShow"
    width="50%"
  >
    <el-transfer
      v-model="selectedRoles"
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
    allRole: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      data: [],
      selectedRoles: [],
      isShow: false,
      userId: null,
      propsOption: {
        key: "value",
        label: "label",
        disabled: "disabled",
      },
    };
  },
  watch: {
    allRole(val) {
      this.data = val;
    },
  },
  methods: {
    open(userId) {
      this.userId = userId;
      this.getRoles(userId);
      this.isShow = true;
    },
    onSave() {
      post("assign-role", {
        user_id: this.userId,
        role_ids: this.selectedRoles,
      }).then((res) => {
        this.$message.success(res.message);
      });
      this.isShow = false;
    },
    onClose() {
      this.isShow = false;
    },
    getRoles(userId) {
      get(`user/${userId}/roles`).then((res) => {
        this.selectedRoles = res.data.roles;
      });
    },
  },
};
</script>