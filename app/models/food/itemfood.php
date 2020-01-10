<?php

namespace App\models\food;

use Illuminate\Database\Eloquent\Model;

class itemfood extends Model
{
    protected $table = 'food_items';
    public function fooditems()
    {
        return $this->belongsToMany('App\models\food\food', 'food_food_items', 'id_food_items', 'id_food');
    }
}
