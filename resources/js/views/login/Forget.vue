<template>
  <div class="login-box">
    <div class="form-container">
      <form v-if="!isSendEmail" action="#">
        <h1>找回密码</h1>
        <input v-model="email"  type="email" placeholder="请输入邮箱" />
        <button  @click="submit" type="button" >确定</button>
      </form>
      <form v-else-if="isSendEmail" action="#">
        <h1>请继续操作</h1>
        <input v-model="token"  type="text" placeholder="请输入邮箱收到的验证码" />
        <input v-model="password"  type="password" placeholder="请输入新密码" />
        <button @click="resetPassword" type="button" >确定</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Forget',
  data () {
    return {
      isSendEmail: false,
      email: '',
      token: '',
      password: ''
    }
  },
  mounted() {
    const s = document.createElement('script');
    s.type = 'text/javascript';
    s.src = 'https://ssl.captcha.qq.com/TCaptcha.js';
    document.body.appendChild(s);
  },
  methods:{
    submit() {
      this.$http.post('send_mail', {email: this.email}).then((res) => {
        if (res.status === 200 && res.data.code === 1) {
          this.$message.success('邮件发送成功');
          this.isSendEmail = true;
        } else if (res.status === 200 && res.data.code === 0) {
          this.$message.error(res.data.msg);
        } else {
          this.$message.error('邮件发送失败');
        }
      }).catch(reason => {
        this.$message.error('网络错误')
      })
    },
    resetPassword() {
      this.$http.post('change_password', {token: this.token,password:this.password}).then((res) => {
        if (res.status === 200 && res.data.code === 1) {
          this.$message.success('修改成功');
          let _this = this;
          setTimeout(() => {
            _this.$router.push({path: '/'})
          }, 2000);
        } else if (res.status === 200 && res.data.code === 0) {
          this.$message.error(res.data.msg);
        } else {
          this.$message.error('修改失败~');
        }
      }).catch(reason => {
        this.$message.error(reason);
      })
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
    margin: 15px;
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
    top: 50%;
    height: 300px;
    width: 400px;
    left: 50%;
    transform: translate(-50%, -50%);
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
