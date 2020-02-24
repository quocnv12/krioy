<?php

namespace App\Http\Controllers\Api\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\food\food;

class FoodController extends Controller
{
    public function index()
    {
        $food = food::with(['mealtypefood:name','quantityfood:name','food:food_name'])->get();
        return response()->json([
            'foods' => $food
        ],200);
    }
}
