<template>  
  <div class="container">
  <el-steps :active="active" align-center style="margin-top: 50px;">
  <el-step title="選擇日期"></el-step>
  <el-step title="選擇營地"></el-step>
  <el-step title="填寫資料"></el-step>
</el-steps>
<!-- 選擇日期 -->
 <div class="block" v-show="dateshow">
   <h2>選擇日期</h2>
    <span class="demonstration"></span>
    <el-date-picker
      v-model="date"
      type="daterange"
      range-separator="至"
      start-placeholder="開始日期"
      end-placeholder="结束日期">
    </el-date-picker>
  </div>
  <!-- 選擇營地 -->
  <div v-show="tentshow">
  <img src="../assets/map.png">
  <el-table    
    ref="multipleTable"
    :data="tableData3"
    tooltip-effect="dark"
    style="width: 100%"
    @selection-change="handleSelectionChange">
    <el-table-column
      type="selection"
      width="55">
    </el-table-column>
    <el-table-column
      label="圖片"
      width="120">
      <template slot-scope="scope">{{ scope.row.date }}</template>
    </el-table-column>
    <el-table-column
      prop="name"
      label="營區"
      width="240">
    </el-table-column>
    <el-table-column
      prop="quality"
      label="數量"
      width="120">
    </el-table-column>
    <el-table-column
      prop="price"
      label="價格"
      width="120">
    </el-table-column>
    <el-table-column
      prop="address"
      label="地址"
      show-overflow-tooltip>
    </el-table-column>
  </el-table>
  </div>
<!-- 填寫表單 -->
<el-form ref="form" :model="form" label-width="80px" class="form2" v-show="formshow">
  <el-form-item label="性別">
    <el-radio-group v-model="form.sex" class="sex">
      <el-radio label="男性"></el-radio>
      <el-radio label="女性"></el-radio>
    </el-radio-group>
  </el-form-item>
  <el-form-item label="姓名">
    <el-input v-model="form.name"></el-input>
  </el-form-item>  
  <el-form-item label="電子信箱">
    <el-input v-model="form.mail"></el-input>
  </el-form-item>
  <el-form-item label="市話">
    <el-input v-model="form.telephone"></el-input>
  </el-form-item>
  <el-form-item label="行動電話">
    <el-input v-model="form.cellphone"></el-input>
  </el-form-item>
</el-form>
  <el-button v-if="active < 2" style="margin-top: 100px;" @click="next">下一步</el-button>
  <el-button v-if="active == 2" style="margin-top: 100px;" @click="onsubmit">送出</el-button>
  <el-button style="margin-top: 100px;" @click="previous">返回</el-button>
  <el-button v-if="active == 1" @click="toggleSelection()">取消选择</el-button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: 0,
      date: "",
      dateshow: true,
      tentshow: false,
      formshow: false,
      tableData3: [
        {
          img: "2016-05-03",
          name: "景觀草皮區",
          quality: "1",
          price: "3000",
          address: "上海市普陀区金沙江路 1518 弄"
        }
      ],
      multipleSelection: [],
      form: {
        name: "",
        sex: "",
        mail: "",
        cellphone: "",
        mail: ""
      }
    };
  },
  // mounted() {  印出AXIOS
  //   this.$http.get();
  //   console.log();
  // },
  methods: {
    next() {
      console.log(this.active);
      if (this.active === 0) {
        this.dateshow = false;
        this.tentshow = false;
        this.tentshow = true;
      }

      if (this.active === 1) {
        this.formshow = true;
        this.tentshow = false;
        this.dateshow = false;
      }
      if (this.active++ > 1) {
        this.active = 2;
      }
    },
    previous() {
      console.log(this.active);
      if (this.active-- < 1) this.active = 0;
      if (this.active === 0) {
        this.dateshow = true;
        this.tentshow = false;
        this.tentshow = false;
      }
      if (this.active === 1) {
        this.dateshow = false;
        this.formshow = false;
        this.tentshow = true;
      }
      if (this.active === 2) {
        this.formshow = true;
        this.tentshow = false;
        this.dateshow = false;
      }
    },
    toggleSelection(rows) {
      this.$refs.multipleTable.clearSelection();
    },
    handleSelectionChange(val) {
      this.multipleSelection = val;
    },
    onsubmit() {
      this.$http({
        method: "post",
        url: "/Luin/Signup",
        data: {
          name: this.userpwd,
          email: this.newpwd,
          telephone: this.telephone,
          cellphone: this.cellphone
        }
      })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>
<style>
.block {
  margin-top: 30px;
}
.container {
  width: 80%;
  margin: auto;
}
.form2 {
  width: 30%;
  margin: auto;
  margin-top: 30px;
}
</style>
