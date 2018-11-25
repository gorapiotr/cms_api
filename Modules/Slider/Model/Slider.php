<?php

namespace Modules\Slider\Model;


use Illuminate\Database\Eloquent\Model;
use Modules\User\Model\User;

class Slider extends Model
{
    protected $table = 'slides';

    protected $fillable = [
        'file_name',
        'image_url',
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
