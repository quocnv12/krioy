<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ObservationTypeModel extends Model
{
    protected $table = 'observations';

    protected $fillable = [
        'id_children',
        'id_observations'
    ];

    public $timestamps = false;
}
