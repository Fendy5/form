<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function getUserId;

/**
 * App\Models\Form
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property mixed $content
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form whereUserId($value)
 * @mixin \Eloquent
 * @property string $question_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Form whereQuestionId($value)
 */
class Form extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    public function getForm($question_id)
    {
        return $this->where(['question_id' => $question_id])->first();
    }

    public function getForms()
    {
        return $this->where(['user_id' => getUserId()])->select(['question_id','title','status','created_at'])->get();
    }

    public function deleteByQuestionId($question_id)
    {
        return $this->where('question_id', $question_id)->delete();
    }

    public function updateStatus($id,$status)
    {
        return $this->where('question_id', $id)->update(['status' => $status,]);
    }
}
