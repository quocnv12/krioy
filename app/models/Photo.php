<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class Photo extends Model
{
    protected $table = "photos";

    public function imageable()
    {
        return $this->morphTo();
    }
}
