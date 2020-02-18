<template>
  <div class="login-box">
    <div class="login">
      <div class="container" id="container">
        <div class="form-container sign-up-container">
          <form action="#">
            <h1>创建新账号</h1>
            <div class="social-container">
              <a href="#" class="social"><i class="iconfont icon-wechat" /></a>
              <a href="#" class="social"><i class="iconfont icon-weibo" /></a>
              <a href="#" class="social"><i class="iconfont icon-qq" /></a>
            </div>
            <span>或者用你的邮箱进行注册</span>
            <input  v-model="sign_up.username" type="text" placeholder="用户名" />
            <input v-model="sign_up.email" type="email" placeholder="邮箱" />
            <input  v-model="sign_up.password" type="password" placeholder="密码" />
            <button @click="handleSignUp" type="button">注 册</button>
          </form>
        </div>
        <div class="form-container sign-in-container">
          <form action="#">
            <h1>登 录</h1>
            <div class="social-container">
              <a href="#" class="social"><i class="iconfont icon-wechat" /></a>
              <a href="#" class="social"><i class="iconfont icon-weibo" /></a>
              <a href="#" class="social"><i class="iconfont icon-qq" /></a>
            </div>
            <span>或者用账号登录</span>
            <input  v-model="login.email" type="email" placeholder="邮箱" />
            <input v-model="login.password" type="password" placeholder="密码" />
            <a href="#">忘记了密码 ?</a>
            <button type="button" @click="handleSignIn">登 录</button>
          </form>
        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Welcome Back!</h1>
              <p>To keep connected with us please login with your personal info</p>
              <button @click="signIn" class="ghost" >登 录</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1>Hello, Friend!</h1>
              <p>Enter your personal details and start journey with us</p>
              <button class="ghost" @click="signUp" >注 册</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    name: 'Login',
    data () {
      return {
        login: {
          email: '',
          password: ''
        },
        sign_up:{
          username: '',
          email: '',
          password: ''
        }
      }
    },
    methods: {
      verifyLogin() {
        if (this.login.email==='')
          return this.$message.error('请输入邮箱');
        else if (!/^([a-zA-Z0-9]+[-_\.]?)+@[a-zA-Z0-9]+\.[a-z]+$/.test(this.login.email))
          return this.$message.error('请输入正确的邮箱');
        else if (this.login.password==='')
          return this.$message.error('请输入密码');
        else
          return 'ok';
      },
      verifySignUp() {
        if (this.sign_up.username==='')
          return this.$message.error('请输入用户名');
        else if (this.sign_up.email==='')
          return this.$message.error('请输入邮箱');
        else if (!/^([a-zA-Z0-9]+[-_\.]?)+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/.test(this.sign_up.email))
          return this.$message.error('请输入正确的邮箱');
        else if (this.sign_up.password==='')
          return this.$message.error('请输入密码');
        else
          return 'ok';
      },
      signUp () {
        const container = document.getElementById('container');
        container.classList.add('right-panel-active');
        console.log('signUp')
      },
      handleSignIn () {
        if (this.verifyLogin() === 'ok') {
          this.$http.post('login', this.login)
            .then((res) => {
              if (res.data.code===1) {
                this.$message.success(res.data.msg);
                window.location.href=res.data.url
              } else this.$message.error(res.data.msg);
            }).catch((error) => {
            console.log(error)
          });
        }
      },
      handleSignUp() {
        if (this.verifySignUp() === 'ok') {
          this.$http.post('/sign_up',this.sign_up)
            .then((res)=>{
              if (res.data.code === 1) {
                this.$message.success(res.data.msg);
                this.sign_up.username = '';
                this.sign_up.password = '';
                this.sign_up.email = '';
                this.signIn();
              }else
                this.$message.error(res.data.msg);
            }).catch((error)=>{
            console.log(error)
          })
        }
      },
      signIn () {
        const container = document.getElementById('container');
        container.classList.remove('right-panel-active');
        console.log('signIn')
      }
    }
  }
</script>

<style lang="css" scoped>
  @import "../../asset/fonts/iconfont.css";
  * {
    box-sizing: border-box;
  }
  body {
    background: #f6f5f7;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: 'Montserrat', sans-serif;
    height: 100vh;
    margin: -20px 0 50px;
  }

  .login-box {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    background-image: url('../../asset/images/bg_login.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
  }

  .login {
    border-radius: 5px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
  }

  h1 {
    font-weight: bold;
    margin: 0;
  }

  h2 {
    text-align: center;
  }

  p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 20px 0 30px;
  }

  span {
    font-size: 12px;
  }

  a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
  }

  button {
    border-radius: 20px;
    border: 1px solid #FF4B2B;
    background-color: #FF4B2B;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
  }

  button:active {
    transform: scale(0.95);
  }

  button:focus {
    outline: none;
  }

  button.ghost {
    background-color: transparent;
    border-color: #FFFFFF;
  }

  form {
    background-color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    text-align: center;
  }

  input {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
  }

  .container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25),
    0 10px 10px rgba(0,0,0,0.22);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
  }

  .form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
  }

  .sign-in-container {
    left: 0;
    width: 50%;
    z-index: 2;
  }

  .container.right-panel-active .sign-in-container {
    transform: translateX(100%);
  }

  .sign-up-container {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
  }

  .container.right-panel-active .sign-up-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
  }

  @keyframes show {
    0%, 49.99% {
      opacity: 0;
      z-index: 1;
    }

    50%, 100% {
      opacity: 1;
      z-index: 5;
    }
  }

  .overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
  }

  .container.right-panel-active .overlay-container{
    transform: translateX(-100%);
  }

  .overlay {
    background: #FF416C;
    background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
    background: linear-gradient(to right, #FF4B2B, #FF416C);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #FFFFFF;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
  }

  .container.right-panel-active .overlay {
    transform: translateX(50%);
  }

  .overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
  }

  .overlay-left {
    transform: translateX(-20%);
  }

  .container.right-panel-active .overlay-left {
    transform: translateX(0);
  }

  .overlay-right {
    right: 0;
    transform: translateX(0);
  }

  .container.right-panel-active .overlay-right {
    transform: translateX(20%);
  }

  .social-container {
    margin: 20px 0;
  }

  .social-container a {
    border: 1px solid #DDDDDD;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 40px;
    width: 40px;
  }

  footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
  }

  footer p {
    margin: 10px 0;
  }

  footer i {
    color: red;
  }

  footer a {
    color: #3c97bf;
    text-decoration: none;
  }
</style>
