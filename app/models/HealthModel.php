<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class HealthModel extends Model
{
    protected $table = 'health';

    protected $fillable = [
        'id',
        'id_children',
        'time',
        'sick',
        'growth_height',
        'growth_weight',
        'medicine',
        'incident',
        'blood_group',
        'file_pdf',
    ];

    protected $proxies = '*';
    public function children_profiles(){
        return $this->belongsTo('App\models\ChildrenProfiles','id_children','id');
    }
}
