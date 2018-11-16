<template>  
  <div id="SiteFooter">
    <el-button @click="visible = true">Element</el-button>
    <el-dialog :visible.sync="visible" title="Hello world">
      <p>Try Element</p>
    </el-dialog>
  </div>
</template>

<script>
export default {
  data () {
    return {
     visible: false
    }
  }
}
</script>