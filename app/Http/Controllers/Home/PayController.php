<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Config;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Exceptions\InvalidArgumentException;
use EasyWeChat\Kernel\Exceptions\InvalidConfigException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use function date;
use function dd;
use function getUserId;
use function str_shuffle;
use function substr;

class PayController extends Controller
{
    //
    public function index()
    {
        $app = Factory::payment(config('wechat.payment.default'));
        $shid=date('YmdHis').createRandom(2);
        $fee = \request('fee');
        Order::create([
            'fee' => $fee / 100,
            'user_id' => getUserId(),
            'shid' => $shid
        ]);
        $data = [
            'trade_type' => 'NATIVE',
            'body' => '秋霁问卷-会员升级',
            'out_trade_no' => $shid,
            'total_fee' => $fee,
//            'product_id' => '111',
        ];
        $res = $app->order->unify($data);
        if ($res['code_url']) {
            $rsp=[
                'code' => 1,
                'msg' => '下单成功',
                'out_trade_no' => $shid,
                'code_url'=>$res['code_url']
            ];
        } else {
            $rsp=[
                'code' => 0,
                'msg'=>'下单失败'
            ];
        }
        return $rsp;
    }


    public function query()
    {
        $app = Factory::payment(config('wechat.payment.default'));
        return $app->order->queryByOutTradeNumber(\request('out_trade_no'));
    }

}
