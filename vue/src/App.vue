<template>
  <div id="app">    
    <!-- 導覽列 -->
    <Navbar></Navbar>

    <!-- 路由匹配到的组件將會渲染在這 -->
    <router-view/>
  </div>
</template>

<script>
import Navbar from '@/components/Navbar'
import SiteFooter from '@/components/SiteFooter'    // 載入組件
export default {
  name: "app",
  components: {
    Navbar
  }
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#logo {
  max-width: 60px;
}
</style>
