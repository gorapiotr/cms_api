<?php
/**
 * Created by PhpStorm.
 * User: piotrgora
 * Date: 15.08.2018
 * Time: 18:34
 */

namespace Modules\Settings\Model;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Model\User;

/**
 * Class Settings
 * @property int $id
 * @property string $key
 * @property string $value
 * @property string $description
 * @property string $type
 *
 * @package Modules\Settings\Model
 */
class Settings extends Model
{
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'created_by',
        'updated_by'
    ];

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');
    }
}