<?php

namespace App\models\food;

use Illuminate\Database\Eloquent\Model;

class quantytifood extends Model
{
    protected $table = 'quantity_food';
    public function quantity_foods()
    {
        return $this->hasMany('App\models\food\food', 'quantity', 'id');
    }
    protected $fillable = [
        'name'
    ];
}
