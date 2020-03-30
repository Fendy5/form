<?php

use App\Models\Form;

/**
 * @ClassName ${NAME}
 * @Descridtion TODO
 * @Author 秋霁科技
 * @Date 2020/3/5 19:51
 * @Version 1.0
 **/

function getUserId()
{
    return session()->get('user')->id;
}

function getFormId($question_id)
{
    return (new Form())->getForm($question_id)->id;
}

function createRandom($length)
{
    $str="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
    $name=substr(str_shuffle($str),26,$length);
    return $name;
}
