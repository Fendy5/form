<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function view;

class LoginController extends Controller
{
    //用户登录,get请求~
    public function login()
    {
        return view('home.login.login');
    }

    public function login_post()
    {

    }
}
