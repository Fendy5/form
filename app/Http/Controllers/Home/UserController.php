<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //获取用户信息
    public function getUser()
    {
        $res = (new User())->getUser();
        if ($res) {
            $rsp = [
                'userInfo' => $res,
                'code' => 1,
                'msg' => '获取成功！',
            ];
        } else {
            $rsp = [
                'code' => 0,
                'msg' => '获取失败！',
            ];
        }
        return $rsp;
    }

    //保存用户信息
    public function saveUser()
    {
        $res = (new User())->saveUser(\request('userInfo'));
        if ($res) {
            $rsp = ['code' => 1, 'msg' => '修改成功！',];
        } else {
            $rsp = ['code' => 0, 'msg' => '修改失败！',];
        }
        return $rsp;
    }
}
