<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;
use function dd;
use function json_decode;
use function json_encode;
use function view;

class FormController extends Controller
{
    //save form data
    public function saveData()
    {
        $form = new Form();
        $form->title = \request('title');
        $form->user_id = 1;
        $form->content = json_encode(\request('content'));
        $form->status = 0;
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
        $form = Form::find($id);
        $data = [
            'title'   => $form->title,
            'content' => json_decode($form->content)
        ];
        return $data;
    }


}
