<template>
  <el-dialog title="分配角色" :visible.sync="isShow" width="50%">
    <el-transfer v-model="value" :data="data"></el-transfer>

    <span slot="footer" class="dialog-footer">
      <el-button @click="isShow = false">取 消</el-button>
      <el-button type="primary" @click="isShow = false">确 定</el-button>
    </span>
  </el-dialog>
</template>

<script>
import { get } from "@/api/base.js";
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
      value: [],
      isShow: false,
    };
  },
  watch: {
    allRole(val) {
      this.data = val;
    },
  },
  methods: {
    open(userId) {
      this.getRoles(userId);
      this.isShow = true;
    },

    getRoles(userId) {
      get(`user/${userId}/roles`).then((res) => {
        this.value = res;
      });
    },
  },
};
</script>