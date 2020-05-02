<template>
  <el-row :gutter="20">
    <el-col :span="12" :offset="6">
      <div class="order">
        <el-card :key="order.id" v-for="order in orders">
          <div class="od-header">
            <div class="od-item">
              <div class="od-title">订单编号：</div>
              <div  class="od-text">{{order.shid}}</div>
            </div>
            <div class="od-item">
              <div class="od-title">创建时间：</div>
              <div class="od-text">{{order.created_at}}</div>
            </div>
            <div class="od-item">
              <div class="od-title">状态：</div>
              <div :class="[order.status==='1'?'od-text od-success':'od-text']" >{{order.status==='1'?'已支付':'未支付'}}</div>
            </div>
          </div>
          <div class="od-body">
            <div class="function">开通会员</div>
            <div style="color: orange" class="fee">￥{{order.fee}}</div>
          </div>
        </el-card>
      </div>
    </el-col>
  </el-row>
</template>

<script>
export default {
  data () {
    return {
      orders: []
    }
  },
  created() {
    this.$http.post('orders').then((res) => {
      console.log(res);
      if (res.status === 200) {
        this.orders = res.data;
      } else {
        this.$message.error('请求失败');
      }
    }).catch(reason => {
      this.$message.error('网络错误')
    })
  },
  methods () {

  }
}
</script>

<style lang="scss" scoped>
  .order {
    width: 80%;
  }
  .el-card {
    margin: 40px 0 !important;
  }
  .od-header {
    display: flex;
    justify-content: space-between;
    font-size: small;
    padding: 10px 0;
    color: gray;
    border-bottom: 1px solid;
    line-height: 13px;
  }
  .od-item {
    display: flex;
    align-items: center;
    padding: 0 10px;
  }
  .od-body {
    display: flex;
    padding: 10px 10px 0;
    justify-content: space-between;
  }
  .od-title {
    color: black;
  }
  .od-success {
    color: green;
  }

</style>
