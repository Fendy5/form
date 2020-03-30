<template>
  <el-row :gutter="20">
    <el-col :span="18" :offset="3">
      <el-col :span="8">
        <el-card class="box-card">
          <div class="ug-header">
            <div class="title">免费版</div>
            <div class="price">￥0</div>
          </div>
          <div class="ug-detail">
            <ul>
              <li>无VIP标识</li>
              <li>5次导入/天</li>
              <li>5次导出/天</li>
              <li>存在页眉页脚</li>
            </ul>
          </div>
          <div class="pay">
            <el-button disabled >升级</el-button>
          </div>
        </el-card>
      </el-col>
      <el-col :span="8">
        <el-card class="box-card">
          <div class="ug-header">
            <div class="title">高级会员</div>
            <div class="price">￥5/月</div>
          </div>
          <div class="ug-detail">
            <ul>
              <li>VIP标识</li>
              <li>无限次导入/天</li>
              <li>无限次导出/天</li>
              <li>去除页眉页脚</li>
            </ul>
          </div>
          <div class="pay">
            <el-button  @click="pay(5)" type="primary">升级</el-button>
          </div>
        </el-card>
      </el-col>
      <el-col :span="8">
        <el-card class="box-card">
          <div class="ug-header">
            <div class="title">永久会员</div>
            <div class="price">￥50</div>
          </div>
          <div class="ug-detail">
            <ul>
              <li>VIP标识</li>
              <li>无限次导入/天</li>
              <li>无限次导出/天</li>
              <li>去除页眉页脚</li>
            </ul>
          </div>
          <div class="pay">
            <el-button @click="pay(50)"  type="primary">升级</el-button>
          </div>
        </el-card>
      </el-col>
      <el-dialog width="200px" :center="true" :show-close="false"  title="扫描支付" :visible.sync="payCode">
        <div class="device-preview">
          <qriously :value="codeUrl" :size="150" />
        </div>
      </el-dialog>
    </el-col>
  </el-row>
</template>

<script>
export default {
  data () {
    return {
      payCode: false,
      codeUrl:"weixin://wxpay/bizpayurl?pr=2OyXz4k",
      out_trade_no:''
    }
  },
  methods:{
    pay(fee) {
      this.$http.post('pay', {fee: fee}).then((res) => {
        if (res.status === 200 && res.data.code === 1) {
          this.codeUrl = res.data['code_url'];
          this.out_trade_no = res.data['out_trade_no'];
          this.payCode = true;
          let _this = this;
          let timeout=setInterval(function () {
            _this.$http.post('pay/query', {out_trade_no: _this.out_trade_no}).then((res) => {
              if (res.status === 200 && res.data['trade_state'] === 'SUCCESS') {
                _this.payCode = false;
                _this.$message.success('支付成功');
                clearTimeout(timeout);
              }
            }).catch(reason => {
              _this.$message.error('网络错误')
            })
          },3000)
        } else {
          this.$message.error('支付失败');
        }
      }).catch(reason => {
        this.$message.error('网络错误')
      })
    }
  }
}
</script>

<style lang="scss" scoped>
  .box-card {
    width: 80%;
    height: 400px;
    position: relative;
  }
  .ug-header {
    text-align: center;
    border-bottom: gray 1px solid;
  }
  .title {
    font-size: 24px;
    font-weight: 900;
  }
  .price {
    color: orange;
    font-weight: 900;
    font-size: 30px;
    margin: 20px 0;
  }
  .ug-detail {
    margin: 20px;
    text-align: center;
  }
  li {
    margin: 10px 0;
    font-size: 14px;
    color: gray;
  }
  .pay {
    position: absolute;
    bottom: 20px;
    width: 100%;
    left: 0;
    text-align: center;
  }
  .el-button {
    width: 80%;
  }
</style>
