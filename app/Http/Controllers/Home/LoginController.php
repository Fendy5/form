<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use function file_get_contents;
use function session;
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

    // 微信登录
    public function wechatLogin()
    {
        return \request('openid');
    }

    public function logout()
    {
        session()->forget('user');
        return [
            'code' => 1,
            'msg'=>'退出成功'
        ];
    }
}
