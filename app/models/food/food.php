<?php

namespace App\models\food;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    protected $table = 'food';
   public function food()
   {
       return $this->belongsToMany('App\models\food\itemfood', 'food_food_items', 'id_food', 'id_food_items');
   }
}
