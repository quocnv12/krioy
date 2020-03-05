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
   public function mealtypefood()
   {
       return $this->belongsTo('App\models\food\mealtype', 'meal_type', 'id');
   }
   public function quantityfood()
   {
       return $this->belongsTo('App\models\food\quantytifood', 'quantity', 'id');
   }
   public function children_food()
   {
       return $this->belongsToMany('App\models\ChildrenProfiles', 'children_food', 'id_food', 'id_children');
   }
//    public function programfood()
//    {
//        return $this->belongsTo('App\models\Programs', 'id_program', 'id');
//    }
   protected $fillable = [
    'meal_type',
    'quantity',
    // 'id_program',
    // 'date_begin',
    // 'date_end'
    ];

}
