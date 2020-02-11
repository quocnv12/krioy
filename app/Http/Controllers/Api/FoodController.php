<?php

namespace App\Http\Controllers\Api;

use App\models\food\{food,mealtype,quantytifood};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Response;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food = food::with(['mealtypefood','quantityfood','food:id,food_name'])->get();
        return response()->json([
            'foods' => $food
        ],200);
    }
    public function add()
    {
        $food = food::with(['mealtypefood','quantityfood','food:id,food_name'])->get();
        return response()->json([
            'foods' => $food
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =  
            [
                'meal_type'  => 'required',
                'quantity'   => 'required',
                'id_program' => 'required',
                'food_name'  => 'required'
            ];
            $validator = Validator::make($request->all(), $rules,[
                'meal_type.required'  => 'Please enter meal type !',
                'quantity.required'   => 'Please enter quantity !',
                'id_program.required' => 'Please enter id program !',
                'food_name.required'  => 'Please enter food name !'
            ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $food = food::create($request->all());
        $food->save();
        $foodss = explode(',',$request->food_name);
       $food->food()->Attach($foodss);
       return response()->json(['massage' => 'Add food success !'], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\food\food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return food::with(['mealtypefood','quantityfood','food:id,food_name'])->get();
        $food = food::find($id);
        if(!$food)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        $foods = food::find($id)->load(['mealtypefood','quantityfood','food']);
        return response()->json(['food' => $foods], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\food\food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food = food::find($id);
        if(!$food)
        {
            return response()->json(['massage' => 'Record not found !'] , 404);
        }
        $rules =  
        [
            'meal_type'  => 'required',
            'quantity'   => 'required',
            'id_program' => 'required',
            'food_name'  => 'required'
        ];
        $validator = Validator::make($request->all(), $rules,[
            'meal_type.required'  => 'Please enter meal type !',
            'quantity.required'   => 'Please enter quantity !',
            'id_program.required' => 'Please enter id program !',
            'food_name.required'  => 'Please enter food name !'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
            $food->update($request->all());
            $food->save();
            $foodss = explode(',',$request->food_name);
            $food->food()->Sync($foodss);
            return response()->json(['massage' => 'Edit food success !'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\food\food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = food::find($id);
        if(!$food)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        $food->delete($id);
        return response()->json(['massage' => 'Delete food success !'], 200);
        
    }




















    //-----------------Meal type---------------------


    public function indexMealType()
    {
        // $mealtype = mealtype::with(['mealtype_foods'])->get();
        $mealtype = mealtype::all();
        return response()->json([
            'mealtype' => $mealtype
        ],200);
    }

    //--add meal type
    public function storeMealType(Request $request)
    {
        $rules =  
            [
                'name'  => 'required',
            ];
            $validator = Validator::make($request->all(), $rules,[
                'name.required'  => 'Please enter name meal type !',
            ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $mealtype = mealtype::create($request->all());
        $mealtype->save();
       return response()->json(['massage' => 'Add meal type success !'], 201);

    }

    //--show meal type
    public function showMealType($id)
    {
        //return food::with(['mealtypefood','quantityfood','food:id,food_name'])->get();
        $mealtype = mealtype::find($id);
        if(!$mealtype)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        $mealtype = mealtype::find($id);
        // ->load(['mealtype_foods']);
        return response()->json(['mealtype' => $mealtype], 200);

    }

    //---edit meal type
    public function updateMealType(Request $request, $id)
    {
        $mealtype = mealtype::find($id);
        if(!$mealtype)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        $rules =  
        [
            'name'  => 'required|unique:meal_type,name',
          
        ];
        $validator = Validator::make($request->all(), $rules,[
            'name.required'  => 'Please enter meal type !',
            'name.unique'    => 'Meal type already exist !'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
            $mealtype->update($request->all());
            $mealtype->save();
            return response()->json(['massage' => 'Edit meal type success !'], 201);
    }

    //----delete meal type
    public function destroyMealType($id)
    {
        $mealtype = mealtype::find($id);
        if(!$mealtype)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        $mealtype->delete($id);
        return response()->json(['massage' => 'Delete meal type success !'], 200);
        
    }






    //-------------------quantity food----------------------


    public function indexQuantity()
    {
        $quantityfood = quantytifood::all();
        return response()->json([
            'quantityfood' => $quantityfood
        ],200);
    }

    //--add quantity
    public function storeQuantity(Request $request)
    {
        $rules =  
            [
                'name'  => 'required',
            ];
            $validator = Validator::make($request->all(), $rules,[
                'name.required'  => 'Please enter name quantity !',
            ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $quantity = quantytifood::create($request->all());
        $quantity->save();
       return response()->json(['massage' => 'Add quantity food success !'], 201);

    }

    //--show quantity
    public function showQuantity($id)
    {
        //return food::with(['mealtypefood','quantityfood','food:id,food_name'])->get();
        $quantityfood = quantytifood::find($id);
        if(!$quantityfood)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        $quantityfood = quantytifood::find($id);
        return response()->json(['quantity_food' => $quantityfood], 200);

    }





    //---edit quantity food
    public function updateQuantity(Request $request, $id)
    {
        $quantityfood = quantytifood::find($id);
        if(!$quantityfood)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        
        $rules =  
        [
            'name'  => 'required|unique:quantity_food,name',
          
        ];
        $validator = Validator::make($request->all(), $rules,[
            'name.required'  => 'Please enter quantity food !',
            'name.unique'    => 'Quantity food already exist !'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $quantityfood->update($request->all());
        $quantityfood->save();
        return response()->json(['massage' => 'Edit quantity food success !'], 201);
    }

    //----delete quantity food
    public function destroyQuantity($id)
    {
        $quantity = quantytifood::find($id);
        if(!$quantity)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        $quantity->delete($id);
        return response()->json(['massage' => 'Delete quantity success !'], 200);
        
    }

}
