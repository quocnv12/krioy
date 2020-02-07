<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ObservationModel extends Model
{
    protected $table = 'observations';

    protected $fillable = [
        'id',
        'id_children',
        'id_observations',
        'detailObservation',
        'year',
        'month'
    ];

    public function ObservationType(){
        return $this->belongsTo('App\models\ObservationTypeModel','id_observations','id');
    }
    public function Children(){
        return $this->belongsTo('App\models\ChildrenProfiles','id_children','id');
    }
}
