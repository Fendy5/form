<template>
    <el-container class="home-container">
        <el-header>
            <el-row class="header" type="flex" justify="space-between" :gutter="20">
                <el-col :offset="2" class="logo" :span="4">
                    <a href="/"><img src="../asset/images/logo.png" alt=""></a>
                    <span>秋霁问卷</span>
                </el-col>
                <el-col :span="12">
                    <el-menu router class="el-menu-demo" mode="horizontal" >
                        <el-submenu index="1">
                            <template slot="title">创建问卷</template>
                            <el-menu-item index="/question">在线问卷</el-menu-item>
                            <el-menu-item index="/form">报名表单</el-menu-item>
                            <el-menu-item index="/vote">在线投票</el-menu-item>
                            <el-menu-item index="/exam">考试检测</el-menu-item>
                        </el-submenu>
                      <el-menu-item index="/my_question">我的问卷</el-menu-item>
                    </el-menu>
                </el-col>
                <el-col :span="4">
                    <el-menu router class="el-menu-demo" mode="horizontal">
                        <el-submenu index="4">
                            <template slot="title">
                                <el-avatar shape="circle" src="/images/avatar.jpg"></el-avatar>
                                <span class="nickname">IAmLegend</span>
                            </template>
                            <el-menu-item index="my_profile">个人信息</el-menu-item>
                            <el-menu-item @click="logout" index="/logout">退 出</el-menu-item>
                        </el-submenu>
                    </el-menu>
                </el-col>
            </el-row>
        </el-header>
        <el-main>
            <router-view />
        </el-main>
<!--        <el-footer>-->
<!--            @2020 秋霁科技 版权所有-->
<!--        </el-footer>-->
    </el-container>
</template>

<script>
    export default {
        data () {
            return {}
        },
      methods: {
        logout() {
          this.$http.get('logout')
            .then((res) => {
              if (res.data.code === 1) {
                this.$message.success(res.data.msg);
                window.location.href = '/';
              }else
                this.$message.error(res.data.msg);
            }).catch((error) => {
            console.log(error)
          });
        }
      }
    }
</script>


<style lang="scss" scoped>
    .home-container {
        height: 100%;
    }
    .header {
        min-height: 60px;
        background-color: white;
    }
    .header-logo {
        justify-content: center;
    }
  .logo > a > img{
    width: 30px;
    height: 30px;
    margin-right: 5px;
  }
  .logo > span {
    color: #209add;
  }
</style>
