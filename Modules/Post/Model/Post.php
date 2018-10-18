<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 06.10.2018
 * Time: 14:45
 */

namespace Modules\Post\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Modules\User\Model\User;

/**
 * Class Post
 * @package Modules\Post\Model
 *
 * @property int $id
 * @property string $content
 * @property string $slug
 * @property string $title
 * @property boolean $public
 * @property string $main_image
 * @property string $main_image_type
 * @property string $lead
 * @property User $created_by
 * @property Carbon $created_at
 * @property User $updated_by
 * @property Carbon $updated_at
 */
class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'content',
        'slug',
        'main_image',
        'main_image_type',
        'lead',
        'updated_by',
        'title',
        'public'
    ];

    protected $dates = [
        'created_at',
        'updated_at',];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}