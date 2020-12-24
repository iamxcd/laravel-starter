<template>
  <div class="page-account">
    <div class="page-account-container">
      <div class="page-account-top">
        <div class="page-account-top-logo">
          <h1>xx管理系统</h1>
        </div>

        <div class="page-account-top-desc">v1.0.0</div>
      </div>
      <div class="login-form">
        <el-form
          ref="loginloginForm"
          :model="loginForm"
          :rules="loginRules"
          size="large"
        >
          <el-form-item prop="username">
            <el-input
              autofocus
              v-model="loginForm.username"
              prefix-icon="el-icon-user"
              placeholder="请输入用户名"
            />
          </el-form-item>
          <el-form-item prop="password">
            <el-input
              v-model="loginForm.password"
              type="password"
              prefix-icon="el-icon-lock"
              show-password
              placeholder="请输入密码"
            />
          </el-form-item>
          <el-form-item>
            <el-button
              :loading="loading"
              @click="handleLogin()"
              type="primary"
              style="width: 100%"
              long
              >登录
            </el-button>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>

<script>
import { validUsername } from "@/utils/validate";
import SocialSign from "./components/SocialSignin";

export default {
  name: "Login",
  components: { SocialSign },
  data() {
    return {
      loginForm: {
        username: "admin",
        password: "password",
      },
      loginRules: {
        username: [{ required: true, trigger: "blur" }],
        password: [{ required: true, trigger: "blur" }],
      },
      passwordType: "password",
      capsTooltip: false,
      loading: false,
      showDialog: false,
      redirect: undefined,
      otherQuery: {},
    };
  },
  created() {},
  methods: {
    showPwd() {
      if (this.passwordType === "password") {
        this.passwordType = "";
      } else {
        this.passwordType = "password";
      }
    },
    handleLogin() {
      this.$refs.loginloginForm.validate((valid) => {
        if (valid) {
          this.loading = true;
          this.$store
            .dispatch("user/login", this.loginForm)
            .then(() => {
              this.$router.push({
                path: this.redirect || "/",
                query: this.otherQuery,
              });
              this.loading = false;
            })
            .catch(() => {
              this.loading = false;
            });
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    getOtherQuery(query) {
      return Object.keys(query).reduce((acc, cur) => {
        if (cur !== "redirect") {
          acc[cur] = query[cur];
        }
        return acc;
      }, {});
    },
    // afterQRScan() {
    //   if (e.key === 'x-admin-oauth-code') {
    //     const code = getQueryObject(e.newValue)
    //     const codeMap = {
    //       wechat: 'code',
    //       tencent: 'code'
    //     }
    //     const type = codeMap[this.auth_type]
    //     const codeName = code[type]
    //     if (codeName) {
    //       this.$store.dispatch('LoginByThirdparty', codeName).then(() => {
    //         this.$router.push({ path: this.redirect || '/' })
    //       })
    //     } else {
    //       alert('第三方登录失败')
    //     }
    //   }
    // }
  },
};
</script>

<style lang="scss" scoped>
.page-account {
  background-repeat: no-repeat;
  background-position: 50%;
  background-size: 100%;
  background: #f0f2f5;
  background-image: url("/static/images/login-bg.svg");
  height: 100%;
}
.page-account-container {
  padding: 32px 0 24px 0;
}

.page-account-container {
  flex: 1;
  padding: 7% 0;
  width: 384px;
  margin: 0 auto;

  .page-account-top {
    padding: 32px 0;
    text-align: center;
  }
  .page-account-top-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    h1 {
      font-weight: 600;
      font-size: 33px;
      font-family: Avenir, Helvetica Neue, Arial, Helvetica, sans-serif;
    }
  }
  .page-account-top-logo img {
    height: 44px;
    margin-right: 16px;
  }

  .page-account-top-desc {
    color: rgba(0, 0, 0, 0.45);
    font-size: 14px;
    margin-top: 20px;
  }

  .page-account-auto-login {
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
  }
}

.global-footer {
  margin: 48px 0 24px 0;
  padding: 0 16px;
  text-align: center;
  color: rgba(0, 0, 0, 0.45);
  font-size: 14px;
}
</style>