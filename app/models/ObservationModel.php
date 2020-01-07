<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ObservationModel extends Model
{
    protected $table = 'observations';

    protected $fillable = [
        'id',
        'id_children',
        'id_observations'
    ];

    public $timestamps = false;
    public function ObservationType(){
        return $this->belongsTo('App\Models\ObservationTypeModel','id_observations','id');
    }
    public function Childrent(){
        return $this->belongsTo('App\Models\ChildrenProfiles','id_children','id');
    }
}
