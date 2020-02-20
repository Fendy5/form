<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Form;
use Illuminate\Http\Request;
use function dd;
use function EasyWeChat\Kernel\Support\str_random;
use function json_decode;
use function json_encode;
use function session;
use function view;

class FormController extends Controller
{
    //save form data
    public function saveData()
    {
        $form = new Form();
        $form->title = \request('title');
        $form->user_id = session()->get('user')->id;
        $form->content = json_encode(\request('content'));
        $form->status = 0;
        $form->question_id = str_random(16);
        $form->save();
        return "ok!";
    }

    //display form content
    public function display($id)
    {
        $data = [
            'id' => $id
        ];
        return view('home.display',$data);
    }

    public function getData()
    {
        $id = \request('id');
        $form = Form::where(['question_id' => $id])->first();
        $data = [
            'id' => $id,
            'title'   => $form->title,
            'content' => json_decode($form->content)
        ];
        return $data;
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
