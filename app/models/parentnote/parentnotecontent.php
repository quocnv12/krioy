<?php

namespace App\models\parentnote;

use Illuminate\Database\Eloquent\Model;

class parentnotecontent extends Model
{
    protected $table = "parent_note_content";

    public function parent_note(){
        return $this->belongsTo('App\models\parentnote\parentnote','id_parent_note', 'id');
    }
}
