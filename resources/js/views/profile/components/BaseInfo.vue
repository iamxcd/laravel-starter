<template>
  <avue-form
    ref="form"
    v-model="obj"
    :option="option"
    @reset-change="emptytChange"
    @submit="submit"
  ></avue-form>
</template>

<script>
import { uploadUrl, put } from "@/api/base.js";
export default {
  props: {
    user: {
      type: Object,
      default: () => {
        return {};
      },
    },
  },
  data() {
    return {
      obj: {},
      option: {
        submitText: "完成",
        emptyBtn: false,
        submitText: "保存",
        column: [
          {
            label: "ID",
            prop: "id",
            display: false,
          },
          {
            label: "姓名",
            prop: "name",
          },
          {
            label: "用户名",
            prop: "username",
            tip: "用户名用于登录",
            tipPlacement: "left",
          },
          {
            label: "手机",
            prop: "phone",
          },
          {
            label: "简介",
            prop: "introduction",
            type: "textarea",
            span: 24,
          },
          {
            label: "头像",
            prop: "avatar",
            type: "upload",
            action: uploadUrl(),
            listType: "picture-img",
          },
        ],
      },
    };
  },
  created() {
    this.obj = this.user;
  },
  methods: {
    submit(data, done) {
      put("me", data)
        .then((res) => {
          this.$message.success("修改成功");
          done();
        })
        .catch(() => {
          done();
        });
    },
    emptytChange() {},
  },
};
</script>
