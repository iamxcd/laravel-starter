<template>
  <div class="app-container">
    <div v-if="user">
      <el-card>
        <el-tabs v-model="activeTab">
          <el-tab-pane label="基本信息" name="base-info">
            <base-info :user="user" />
          </el-tab-pane>
          <el-tab-pane label="修改密码" name="update-pwd">
            <account />
          </el-tab-pane>
        </el-tabs>
      </el-card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import UserCard from "./components/UserCard";
import Activity from "./components/Activity";
import Timeline from "./components/Timeline";
import Account from "./components/Account";
import BaseInfo from "./components/BaseInfo";

export default {
  name: "Profile",
  components: { UserCard, Activity, Timeline, Account, BaseInfo },
  data() {
    return {
      user: {},
      activeTab: "base-info",
    };
  },
  computed: {
    ...mapGetters(["userinfo"]),
  },
  created() {
    this.getUser();
  },
  methods: {
    getUser() {
      this.user = this.userinfo;
    },
  },
};
</script>
