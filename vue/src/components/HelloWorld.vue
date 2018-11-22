<template>
  <el-container>
    <el-main>
      <div class="hello">
        <img src="../assets/harden.jpeg">
        <h1>{{ msg }}</h1>
        <el-row :gutter="20">
          <el-col :span="12">
            <div class="grid-content bg-purple"><img src="../assets/1.jpg" alt=""></div>
          </el-col>
          <el-col :span="12">
            <div class="grid-content bg-purple content">
              <h2>帝景區</h2>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos quibusdam atque aliquam omnis sapiente
                quo,
                perferendis, molestiae,vitae porro eligendi maiores distinctio explicabo. Obcaecati minus commodi quis
                omnis,rem similique!
              </p>
            </div>
          </el-col>
        </el-row>
        <el-row :gutter="20">
          <el-col :span="12">
            <div class="grid-content bg-purple content">
              <h2>景觀區</h2>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos quibusdam atque aliquam omnis sapiente
                quo,
                perferendis, molestiae,vitae porro eligendi maiores distinctio explicabo. Obcaecati minus commodi quis
                omnis,rem similique!
              </p>
            </div>
          </el-col>
          <el-col :span="12">
            <div class="grid-content bg-purple">
              <img src="../assets/2.jpg" alt="">
            </div>
          </el-col>
        </el-row>
      </div>
    </el-main>
  </el-container>
</template>

<script>
  export default {
    name: "HelloWorld",
    data() {
      return {
        msg: "HelloWorld"
      };
    }
  };
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1,
  h2 {
    font-weight: normal;
  }

  ul {
    list-style-type: none;
    padding: 0;
  }

  li {
    display: inline-block;
    margin: 0 10px;
  }

  a {
    color: #42b983;
  }
  el-row>el-col>.content{
    vertical-align: middle;
  }
</style>