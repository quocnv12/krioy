<?php

namespace App\models\food;

use Illuminate\Database\Eloquent\Model;

class mealtype extends Model
{
    protected $table = 'meal_type';
    public function mealtype_foods()
    {
        return $this->hasMany('App\models\food\food', 'meal_type', 'id');
    }

    protected $fillable = [
        'name'
        ];
}
