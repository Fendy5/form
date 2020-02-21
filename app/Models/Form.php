<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function getForm($question_id)
    {
        return $this->where(['question_id' => $question_id])->first();
    }
}