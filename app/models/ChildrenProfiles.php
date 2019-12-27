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
        'status',
        'image',
        'exist',
    ];
    public function Health(){
        return $this->hasMany('App\Models\HealthModel','id_children','id');
    }
    public function Childrent(){
        return $this->hasMany('App\Models\ObservationModel','id_children','id');
    }


    protected $timestamp = false;

}
