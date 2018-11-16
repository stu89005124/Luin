<template>  
  <div class="nav">
  <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
  <el-menu-item index="/">首頁</el-menu-item>
  <el-menu-item index="sign">立刻訂位</el-menu-item>
  <el-menu-item index="3">分頁3</el-menu-item>
  <el-menu-item class="member" index="5">註冊</el-menu-item>
  <el-menu-item class="member" index="4">登入</el-menu-item>
</el-menu>
  <img src="../assets/logo.png" id="logo">
</div>
</template>

<script>
export default {
  data() {
    return {
      activeIndex: ""
    };
  },
  methods: {
    handleSelect(key, keyPath) {
      this.$router.push(key);
    }
  }
};
</script>

<style>
.el-menu--horizontal>.el-menu-item.member{
  float: right;
  margin-right: 30px;
}
</style>
