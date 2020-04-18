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
use function getUserId;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $weibo_id
 * @property string|null $wechat_id
 * @property string|null $qq_id
 * @property string $avatar
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereQqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereWechatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereWeiboId($value)
 * @mixin \Eloquent
 * @property float $balance
 * @property int $vip
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereVip($value)
 */
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

    public function getUser()
    {
        return $this->where(['id' => getUserId()])->select(['name','email','balance','vip','password'])->first();
    }

    public function saveUser($userInfo)
    {
        return $this->where(['id' => getUserId()])->update($userInfo);
    }
}
