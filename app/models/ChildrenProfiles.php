<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ChildrenProfiles extends Model
{
    //
    protected $table = 'children_profiles';
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'blood_group',
        'gender',
        'date_of_joining',
        'unique_id',
        'address',
        'allergies',
        'additional_note',
        'id_programs',
        'status',
        'exist',
    ];

    protected $timestamp = false;
}
