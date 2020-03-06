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
        $id = \request('id');
        if ($id) {
            Form::where('question_id',$id)->update([
                'title'=>\request('title'),
                'content'=>json_encode(\request('content'))
            ]);
            return [
                'formUrl' => $id
            ];
        }else{
            $form = new Form();
            $form->title = \request('title');
            $form->user_id = session()->get('user')->id;
            $form->content = json_encode(\request('content'));
            $form->status = 0;
            $formUrl = str_random(16);
            $form->question_id = $formUrl;
            $form->save();
            return [
                'formUrl' => $formUrl
            ];
        }
    }

    public function saveRelease()
    {
        $this->saveData();
        return $this->release();
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
            'formStatus'=>$form->status,
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

    public function getMyForm()
    {
        $forms = (new Form())->getForms();
        return [
            'code' => 1,
            'msg' => '获取成功！',
            'forms' => $forms
        ];
    }

    public function deleteForm()
    {
        $question_id = \request('id');
        $res = (new Form())->deleteByQuestionId($question_id);
        if ($res) {
            $rsp = [
                'code' => 1,
                'msg' => '删除成功！',
            ];
        } else {
            $rsp = [
                'code' => 0,
                'msg' => '删除失败！',
            ];
        }
        return $rsp;
    }

    public function release()
    {
        $id = \request('id');
        $form = new Form();
        $status = $form->getForm($id)->status == '0' ? '1' : '0';
        $res = $form->updateStatus($id, $status);
        if ($res) {
            $rsp = [
                'code' => 1,
                'msg' => '操作成功！',
            ];
        } else {
            $rsp = [
                'code' => 0,
                'msg' => '操作失败！',
            ];
        }
        return $rsp;
    }

    public function getForm()
    {
        $id = \request('id');
        $res = (new Form())->getForm($id);
        if ($res) {
            $rsp = [
                'code' => 1,
                'msg' => '删除成功！',
                'data' => [
                    'id' => $id,
                    'title'   => $res->title,
                    'formStatus'=>$res->status,
                    'content' => json_decode($res->content)
                ]
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
