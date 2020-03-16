<?php

namespace App\models\parentnote;

use Illuminate\Database\Eloquent\Model;

class parentnote extends Model
{
    protected $table = "parent_note";

    public function parent_note_content(){
        return $this->hasMany('App\models\parentnote\parentnotecontent','id_parent_note', 'id');
    }

    public function parent_module(){
        return $this->belongsTo('App\models\ParentModule','title','id');
    }
}
