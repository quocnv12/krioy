<?php

namespace App\models\staff;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'roles';

    public function permission_role()
    {
        return $this->belongsToMany('App\models\permission', 'permission_roles', 'id_role', 'id_permission');
    }

    protected $fillable = [
        'name',
        ];
}
