<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Form;
use Illuminate\Http\Request;
use function array_push;
use function implode;
use function json_decode;
use function json_encode;

class StatisticController extends Controller
{
    //
    public function index()
    {
        $id = \request('id');
        $form = (new Form())->getForm($id);
        $res = (new Answer())->getForms($form->id);
        $answers = [];
        foreach ($res as $item) {
            $temp = [];
            foreach ($item as $i) {
                if ($i->type == 'textarea') {
                    $temp[$i->id] = $i->text;
                } else {
                    $val = [];
                    foreach ($i->options as $option) {
                        array_push($val, $option->text);
                    }
                    $temp[$i->id] = implode(" | ", $val);
                }
            }
            array_push($answers, $temp);
        }
        if ($res) {
            $rsp = [
                'code' => 1,
                'title'=>$form->title,
                'form'=>json_decode($form->content),
                'content' => $answers,
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
}
