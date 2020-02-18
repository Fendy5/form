<?php
/**
 * @ClassName User
 * @Descridtion TODO
 * @Author 秋霁科技
 * @Date 2020/2/18 14:52
 * @Version 1.0
 **/


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    public function createUser(array $data)
    {
        $user = $this->where('name', $data['name'])->first();
        if (!$user) {
            $res = $this->create($data)?'ok':'注册失败';
        } else {
            $res = '邮箱已存在';
        }
        return $res;
    }

    public function verifyLogin($email,$password)
    {
        return $this->where(['email' => $email, 'password' => $password])->first();
    }
}
