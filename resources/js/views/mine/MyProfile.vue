<template>
  <el-row :gutter="20">
    <el-col :span="12" :offset="6">
      <el-card style="width: 100%">
        <h3>用户信息</h3>
        <el-form style="width: 50%"  :model="userInfo" label-width="100px">
          <el-form-item label="昵称">
            <el-input :disabled="ableEdit" v-model="userInfo.name"></el-input>
          </el-form-item>
          <el-form-item label="邮箱">
            <el-input :disabled="ableEdit" v-model="userInfo.email"></el-input>
          </el-form-item>
<!--          <el-form-item label="微信">-->
<!--            <el-input :disabled="ableEdit" v-model="userInfo.wechat"></el-input>-->
<!--          </el-form-item>-->
<!--          <el-form-item label="QQ">-->
<!--            <el-input :disabled="ableEdit" v-model="userInfo.QQ"></el-input>-->
<!--          </el-form-item>-->
          <el-form-item label="密码">
            <el-input type="password" :disabled="ableEdit" v-model="userInfo.password"></el-input>
          </el-form-item>
          <h3>账号信息</h3>
          <div class="userinfo-item">
            <div class="item-left">账户余额</div>
            <div class="item-right">{{userInfo.balance}}</div>
          </div>
          <div class="userinfo-item">
            <div class="item-left">账户类型</div>
            <div class="item-right">{{userInfo.vip===0?'免费用户':'付费用户'}}</div>
          </div>
          <el-form-item style="margin-top: 20px">
            <el-button v-if="ableEdit" @click="changeInfo" type="danger" >更改信息</el-button>
            <el-button v-if="!ableEdit" @click="saveInfo" type="primary" >保存信息</el-button>
            <el-button>取消</el-button>
          </el-form-item>
        </el-form>

      </el-card>
    </el-col>
  </el-row>
</template>

<script>
export default {
  data () {
    return {
      ableEdit:true,
      userInfo:{
        name: '',
        email:'',
        password: '',
        fee:0.00,
        balance: ''
      }
    }
  },
  created() {
    this.$http.post('get_profile').then((res) => {
      if (res.status === 200 && res.data.code === 1) {
        this.userInfo = res.data.userInfo;
      } else {
        this.$message.error('获取用户信息失败');
      }
    }).catch(reason => {
      this.$message.error('网络错误')
    })
  },
  methods:{
    changeInfo() {
      this.ableEdit = false;
    },
    saveInfo() {
      this.$http.post('save_profile', {userInfo: this.userInfo}).then((res) => {
        if (res.status === 200 && res.data.code === 1) {
          this.$message.success('修改成功');
          this.ableEdit = true;
        } else {
          this.$message.error('修改失败');
        }
      }).catch(reason => {
        this.$message.error('网络错误')
      })
    }
  }
}
</script>

<style lang="scss" scoped>
  h3 {
    padding: 10px 30px;
  }
  .userinfo-item {
    display: flex;
    color: #606266;
    font-size: 14px;
    padding: 10px 60px;
  }
  .item-right {
    padding-left: 100px;
    color: black;
  }
</style>
