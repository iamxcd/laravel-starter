<template>
  <el-form ref="pwd" :model="obj" :rules="rules">
    <el-form-item label="原密码" prop="original_pwd">
      <el-input type="password" v-model="obj.original_pwd" />
    </el-form-item>
    <el-form-item label="新密码" prop="password">
      <el-input type="password" v-model="obj.password" />
    </el-form-item>
    <el-form-item label="确认密码" prop="password1">
      <el-input type="password" v-model="obj.password1" />
    </el-form-item>
    <el-form-item>
      <el-button type="primary" @click="submit">提交</el-button>
    </el-form-item>
  </el-form>
</template>

<script>
import { put } from "@/api/base.js";
export default {
  data() {
    return {
      obj: {
        original_pwd: "",
        password: "",
        password1: "",
      },
      rules: {
        original_pwd: [
          { required: true, message: "请输入原密码", trigger: "blur" },
        ],
        password: [
          { required: true, message: "请输入新密码", trigger: "blur" },
          { min: 6, message: "密码至少6位", trigger: "blur" },
        ],
        password1: [
          { required: true, message: "请输入新密码", trigger: "blur" },
          { min: 6, message: "密码至少6位", trigger: "blur" },
        ],
      },
    };
  },
  methods: {
    submit() {
      if (this.obj.password != this.obj.password1) {
        this.$message.error("两次输入密码不一致");
        return;
      }
      this.$refs.pwd.validate((valid) => {
        if (valid) {
          put("update-pwd", this.obj).then((res) => {
            this.$message.success("修改成功");
            this.obj = {
              original_pwd: "",
              password: "",
              password1: "",
            };
          });
        }
      });
    },
  },
};
</script>
