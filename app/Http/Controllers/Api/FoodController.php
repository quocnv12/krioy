<?php

namespace App\Http\Controllers\Api;

use App\models\food\food;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return food::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return food::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\food\food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(food $food)
    {
        $data = food::all();
        foreach ($data as $value) 
        {
            foreach ($value->food as $values) 
            {
                $values->food_name;
            }
        }
        return response()->json([
                 $value
        ], 200 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\food\food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, food $food)
    {
        return $food->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\food\food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(food $food)
    {
        $food->delete();
    }
}
