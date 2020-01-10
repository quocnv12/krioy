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

    public $timestamps = false;
}
