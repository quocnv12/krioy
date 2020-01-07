<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ObservationTypeModel extends Model
{
    protected $table = 'observations_type';

    protected $fillable = [
        'id',
        'name'
    ];

    public $timestamps = false;
    public function ObservationType(){
        return $this->belongsTo('App\Models\ObservationModel','id_observations','id');
    }
}
