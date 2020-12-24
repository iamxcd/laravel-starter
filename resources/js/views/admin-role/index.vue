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
    </avue-crud>
  </div>
</template>

<script>
import indexOption from "./index-option";
import tableMixin from "@/avuejs/table-mixin";

export default {
  name: "Role",
  mixins: [tableMixin],
  data() {
    return {
      uri: "role",
    };
  },
  created() {},
  computed: {
    option() {
      return indexOption(this);
    },
  },
  methods: {},
};
</script>

<style lang="scss" scoped>
.content {
  margin: 10px;
  padding: 10px;
}
</style>

