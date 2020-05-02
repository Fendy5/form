<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use function createRandom;
use function date;
use function env;
use function file_get_contents;
use function request;
use function session;
use function time;
use function url;
use function view;

class LoginController extends Controller
{
    //用户登录,get请求~
    public function login()
    {
        return view('home.login.login');
    }

    // 登录post请求方法
    public function login_post()
    {
        $res = (new User())->verifyLogin(\request('email'),\request('password'));
        if ($res) {
            $data=[
                'code' => 1,
                'msg'=>'登录成功',
                'url'=>'/'
            ];
            session(['user' => $res]);
        }else
            $data=[
                'code' => 0,
                'msg'=>'用户不存在或者密码错误'
            ];
        return $data;
    }

    public function sign_up()
    {
        $data = [
            'name'     => \request('username'),
            'email'    => \request('email'),
            'password' => \request('password')
        ];
        $user = (new User())->createUser($data);
        if ($user == 'ok') {
            $data=['code' => 1, 'msg'=>'注册成功'];
        }else{
            $data=['code' => 0, 'msg'=>$user];
        }
        return $data;
    }

    // 根据微信登录获取的openid处理登录事项
    public function wechatLogin()
    {
        $openid = \request('openid');
        $authId = \request('state');
        if ($openid) {
            $user = (new User())->getUserByWechatId($openid);
            if ($user) {
                $user->update([
                    'auth_id' => $authId
                ]);
            } else {
                $data = [
                    'wechat_id' => $openid,
                    'auth_id'=>$authId
                ];
                User::create($data);
            }
        }
        return view('login.loginSuccess');
    }

    // 微信扫码登录
    public function wechat()
    {
        $data = [
            'authId' => createRandom(8)
        ];
        return view('login.wechat',$data);
    }

    public function verifyQrCodeLogin()
    {
        $authId = \request('authId');
        $user = (new User())->getUserByAuthId($authId);
        if ($user) {
            $rsp = [
                'code' => 1,
                'msg' => '授权登录成功！',
                'url'=>'http://192.168.1.102:8081'
            ];
            session(['user' => $user]);
        } else {
            $rsp = [
                'code' => 0,
                'msg' => '授权失败！',
            ];
        }
        return $rsp;
    }

    public function logout()
    {
        session()->forget('user');
        return [
            'code' => 1,
            'msg'=>'退出成功'
        ];
    }

    public function forget()
    {
        return view();
    }

    public function sendEmail()
    {
        $email = request('email');
        $mail = new PHPMailer();
        $token = createRandom(8);
        $user=User::where(['email'=>$email])->first();
        if (!$user) {
            return [
                'code' => 0,
                'msg' => '该邮箱不存在，请重新输入~'
            ];
        }
        try {
            //服务器配置
            $mail->CharSet ="UTF-8";                     //设定邮件编码
            $mail->SMTPDebug = 0;                        // 调试模式输出
            $mail->isSMTP();                             // 使用SMTP
            $mail->Host = 'smtp.qq.com';                // SMTP服务器
            $mail->SMTPAuth = true;                      // 允许 SMTP 认证
            $mail->Username = 'fendy5@qq.com';                // SMTP 用户名  即邮箱的用户名
            $mail->Password = 'lypgnnwvbjqibcfj';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
            $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
            $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持
            $mail->setFrom('fendy5@qq.com');  //发件人
            $mail->addAddress($email);  // 收件人
            $mail->addReplyTo('fendy5@qq.com'); //回复的时候回复给哪个邮箱 建议和发件人一致
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = '秋霁问卷——找回密码';
            $mail->Body    = '你好，'.$user->name.'！你的验证码为<b>'.$token.'</b>，验证码10分钟内有效。';
            $mail->AltBody = '你好，Fendy！你的验证码为'.$token.'，验证码10分钟内有效。';
            $mail->send();
            $user->update(['remember_token' => $token]);
            return [
                'code' => 1,
                'msg'=>'邮件已发送，注意查收~'
            ];
        } catch (Exception $e) {
            echo '邮件发送失败: ', $mail->ErrorInfo;
        }
    }

    public function changePassword()
    {
        $user = User::where(['remember_token' => request('token')])->first();
        if ($user) {
            $user->update([
                'password' => request('password')
            ]);
            $rsp = [
                'code' => 1,
                'msg' => '修改成功！',
            ];
        } else {
            $rsp = [
                'code' => 0,
                'msg' => '验证码错误！',
            ];
        }
        return $rsp;
    }

}
