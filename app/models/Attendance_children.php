<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Attendance_children extends Model
{
    protected $table = "attendance_children";

    public function atd_chil(){
        return $this->belongsTo(ChildrentProfiles::class,'id_children','id');
    }
    
    public $timestamps = true;
}
