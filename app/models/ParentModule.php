<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ParentModule extends Model
{
    protected $table = 'parent_module';
    public $timestamps = false;

    public function parent_note(){
        return $this->hasMany('App\models\parentnote\parentnote','title','id');
    }
}
