<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ParentProfiles extends Model
{
    //
    protected $table = 'parent_profiles';
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'note',
        'phone'
    ];

    public function children_parent()
    {
        return $this->belongsToMany('App\models\ParentProfiles','children_parent', 'id_children','id_parent' );
    }

    public $timestamps = false;
}
