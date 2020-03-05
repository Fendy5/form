<?php
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
