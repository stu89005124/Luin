<template>  
  <div class="container">
<!-- 填寫表單 -->
<h2>查詢訂位紀錄</h2>
<el-form ref="form" :model="searchform" label-width="80px" class="form2">
  <el-form-item label="姓名">
    <el-input v-model="searchform.name"></el-input>
  </el-form-item>  
  <el-form-item label="電子信箱">
    <el-input v-model="searchform.mail"></el-input>
    </el-form-item>  
  <el-form-item label="行動電話">
    <el-input v-model="searchform.cellphone"></el-input>
  </el-form-item>
</el-form>
  <el-button style="margin-top: 100px;" @click="onsubmit">送出</el-button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      searchform: {
        name: "",
        mail: "",
        cellphone: ""
      }
    };
  },
  methods: {
    onsubmit() {   
      console.log(this.searchform);   
      // this.$http
      //   .post("sign", searchform)
      //   .then(response => {
      //     alert("送出成功");
      //     this.$router.push({ path: "/" });
      //   })
      //   .catch(error => {
      //     console.log(error.response);
      //   });
    }
  }
};
</script>
<style>
.block {
  margin-top: 30px;
}
.container {
  width: 70%;
  margin: auto;
}
.form2 {
  width: 30%;
  margin: auto;
  margin-top: 30px;
}
</style>
