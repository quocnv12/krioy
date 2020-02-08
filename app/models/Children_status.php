<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Children_status extends Model
{
    protected $table = "children_status";

    public function atd_chil(){
        return $this->belongsTo(ChildrenProfiles::class,'id_children','id');
    }
}
