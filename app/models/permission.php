<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $table = 'permission';
    public function rolepermission()
    {
        return $this->belongsToMany('App\models\staff\role', 'permission_roles', 'id_permission', 'id_role');
    }
}
