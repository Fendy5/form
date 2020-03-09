<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use function array_reduce;
use function json_decode;
use function json_encode;

/**
 * App\Models\Answer
 *
 * @property int $id
 * @property int $user_id
 * @property int $form_id
 * @property mixed $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Answer whereUserId($value)
 * @mixin \Eloquent
 */
class Answer extends Model
{
    protected $guarded = [];

    public function getForms($form_id)
    {
        return $this->where(['form_id' => $form_id])->select(['content','created_at'])->get()
            ->map(function ($value) {return (json_decode($value->content));});
    }

    public function serializeOption($array)
    {
        return array_reduce($array, function ($a,$b) {
            return $a + $b;
        });
    }
}
