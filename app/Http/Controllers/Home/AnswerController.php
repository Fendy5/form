<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Form;
use Illuminate\Http\Request;
use function json_decode;
use function json_encode;

class AnswerController extends Controller
{

    public function getAnswers()
    {

    }

    public function submitAnswer()
    {
        $answer = new Answer();
        $answer->form_id = (new Form())->getForm(\request('id'))->id;
        $answer->content = json_encode(\request('content'));
        $res=$answer->save();
        if($res)
            $data=[
                'code' => 1,
                'msg'=>'提交成功'
            ];
        else
            $data=[
                'code' => 0,
                'msg'=>'提交失败'
            ];
        return $data;
    }

}
