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
        'exist',
    ];
    public function Health(){
        return $this->hasMany('App\Models\HealthModel','id_children','id');
    }
    public function Observation(){
        return $this->hasMany('App\Models\ObservationModel','id_children','id');
    }
    public function chil_atd(){
        return $this->hasMany(Attendance_children::class,'id_children','id');
    }
    public function chil_progam()
    {
        return $this->belongsToMany(Programs::class, 'children_programs', 'id_children', 'id_program');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    protected $timestamp = false;

}
