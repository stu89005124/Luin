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
      value-format="yyyy-MM-dd"
      type="daterange"
      range-separator="至"
      start-placeholder="開始日期"
      end-placeholder="结束日期"
      :picker-options="pickerOptions">
    </el-date-picker>
  </div>
  <!-- 選擇營地 -->
  <div v-show="tentshow">
  <img src="../assets/map.png">
  <el-table
    :data="tentlist"
    tooltip-effect="dark"
    style="width: 80%; margin: auto;">
    <el-table-column
      label="圖片"
      width="120">
      <template slot-scope="img">
      <img :src="img.row.img">
      </template>  
    </el-table-column>
    <el-table-column
      prop="area"
      label="營區"
      width="120">
    </el-table-column>
    <el-table-column
      prop="quality"
      label="數量"
      width="150">
      <template slot-scope="abc">        
        <el-input-number 
        v-model="abc.row.quality" 
        size="small" 
        @change="handleChange(abc.row)" 
        :min="0" 
        :max="abc.row.maxquality">        
        </el-input-number>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="color: red">剩餘數量{{ abc.row.maxquality }}</span>
      </template>
    </el-table-column>
    <el-table-column
      prop="price"
      label="價格"
      width="120">
    </el-table-column>
    <el-table-column
      prop="remark"
      label="備註"
      show-overflow-tooltip>
    </el-table-column>
     <el-table-column
      prop="totalprice"
      label="小計(元)"
      width="120">
    </el-table-column>
  </el-table>
    <h3>總計: {{ sumprice }}元</h3>
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
  <el-button v-if="active > 0" style="margin-top: 100px;" @click="previous">返回</el-button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: 0,
      pickerOptions: {
        disabledDate(time) {
          let curDate = new Date().getTime();
          let three = 90 * 24 * 3600 * 1000;
          let threeMonths = curDate + three;
          return time.getTime() < Date.now() || time.getTime() > threeMonths;
        }
      },
      active: 0,
      date: "",
      sumprice: 0,
      dateshow: true,
      tentshow: false,
      formshow: false,
      tentlist: [],
      form: {
        area: [],
        name: "",
        sex: "",
        mail: "",
        cellphone: "",
        mail: ""
      }
    };
  },
  created: function() {
    var self = this;
    this.$http
      .get("sign")
      .then(function(response) {
        self.tentlist = response.data;
      })
      .catch(function(error) {
        console.log(error);
      });
  },
  methods: {
    next() {
      if (this.date == "") {
        alert("日期不得為空");
      } else {
        this.active++;
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
      if (this.active > 2) {
        this.active = 2;
      }
    },
    previous() {
      if (this.active-- < 1) this.active = 0;
      if (this.active === 0) {
        this.dateshow = true;
        this.tentshow = false;
        this.formshow = false;
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
    onsubmit() {
      this.tentlist.forEach(item => {
        if (item.quality > 0) {
          this.form.area.push(item);
          item.reservedate = this.date;
        }
      });
      this.$http
        .post("sign", this.form, this.date)
        .then(response => {
          alert("送出成功");
          this.$router.push({ path: "/" });
        })
        .catch(error => {
          console.log(error.response);
        });
    },
    handleChange(row) {
      this.sumprice = 0;
      this.tentlist = this.tentlist.map(item => {
        if (item.id == row.id) {
          item.totalprice = item.quality * item.price;
        }
        this.sumprice += item.totalprice;
        return item;
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