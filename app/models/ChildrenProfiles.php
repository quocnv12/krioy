<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        return $this->hasMany(Children_status::class,'id_children','id');
    }

    public function parent_children()
    {
        return $this->belongsToMany('App\models\ParentProfiles','children_parent','id_children', 'id_parent' );
    }

    public function chil_program()
    {
        return $this->belongsToMany(Programs::class, 'children_programs', 'id_children', 'id_program');
    }

    public static function getIdObservation($id){
        $object =  ObservationModel::find($id)->where('id_children','=',$id)->orderBy('created_at','DESC')->first();
        if (!$object)
        {
            return null;
        }
        return $object['id'];
    }

    public static function getIdHealth($id){
        
        $object =  HealthModel::where('id_children','=',$id)->orderBy('created_at','DESC')->first();
        if (!$object)
        {
            return null;
        }
        return $object['id'];
    }

    // Polymorphic
    public function photo(){
        return $this->morphMany('App\models\Photo', 'imageable');
    }
   


    protected $timestamp = false;

}
