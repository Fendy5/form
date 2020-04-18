<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use function getUserId;
use function response;

class OrderController extends Controller
{
    //获取所有订单
    public function orders()
    {
        return Order::where('user_id', getUserId())->orderByDesc('id')->get();
    }
}
