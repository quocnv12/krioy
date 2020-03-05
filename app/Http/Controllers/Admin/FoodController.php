<?php

namespace App\Http\Controllers\Admin;
use App\models\food\{itemfood,mealtype,quantytifood,food};
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use carbon\carbon;
use App\Http\Requests\food\{MealTypeRequest,EditMealTypeRequest,QuantityRequest,FoodNameRequest,EditFoodNameRequest};
use App\Http\Requests\food\EditQuantityRequest;
class FoodController extends Controller
{


    public function GetFood() 
    {
        $data['programs']=Programs::all();
        $data['mealtypes']=mealtype::all();
        $data['quantytifoods']=quantytifood::all();
        $data['itemfoods']=itemfood::all();
        return view('pages.food.food',$data);
    }

    public function PostFood(request $request) 
    {
    
    // dd($request->all());
        if($request->children_food==null)
        {
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Pleasea choose children !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Bạn chưa chọn trẻ !')->withInput();
            }
            
        }
        elseif ($request->mealtype==null) {
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Pleasea choose meal type !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Bạn chưa chọn loại bũa ăn !')->withInput();
            }
           
        }
        elseif($request->qtyfood==null)
        {
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Pleasea choose quantity !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Bạn chưa chọn số lượng bữa ăn !')->withInput();
            }
           
        }
        elseif($request->food_name==null)
        {
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Pleasea choose food name !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Bạn chưa chọn món ăn !')->withInput();
            }
            
        }
        else 
        {
            
            $foods =new food;
            $foods->meal_type = $request->mealtype;
            $foods->quantity = $request->qtyfood;
           // $foods->id_program = $request->programs;
            // if(strtotime($request->date_end) > strtotime($request->date_begin))
            // {
            //     $foods->date_begin = carbon::parse($request->date_begin)->format('Y-m-d');
            //     $foods->date_end = carbon::parse($request->date_end)->format('Y-m-d');
            // }else
            // {
            //     if (\Lang::locale() == 'en') {
            //         return redirect()->back()->with('danger','The start date must be smaller than the end date !')->withInput();
            //     }
            //     if (\Lang::locale() == 'vi') {
            //         return redirect()->back()->with('danger','Ngày bắt đầu phải nhỏ hơn ngày kết thúc !')->withInput();
            //     }
            // }
            $foods->save();
            $childrent = explode(',',$request->children_food);
            $mangs=array();
            foreach ($childrent as $item)
            {
                $mangs[]=$item;
            }
           $foods->children_food()->Attach($mangs);

            //$foods->children_food()->Attach($request->children_food);

            $foodss = explode(',',$request->food_name);
            $mang=array();
            foreach ($foodss as $item)
            {
                $mang[]=$item;
            }
           $foods->food()->Attach($mang);

           if (\Lang::locale() == 'en') {
                return redirect()->back()->with('success','Send food success !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('success','Thêm thực đơn thành công !')->withInput();
            }
           
        }
     
        
    }

    //danh sách food
    public function GetList() 
    {
        $data['foods']=food::all();
        return view('pages.food.food.list_food',$data);
    }


    //show theo id
    
    public function showFood($id)
    {
        $data['programs']=Programs::all();
        $data['mealtypes']=mealtype::all();
        $data['quantytifoods']=quantytifood::all();
        $data['itemfoods']=itemfood::all();
        $food = food::all();
        $programs = Programs::orderBy('program_name')->get();
        $children_profiles = DB::table('children_profiles')
                            ->join('children_programs','children_profiles.id','=','children_programs.id_children')
                            ->where('children_programs.id_program','=',$id)
                            ->orderBy('first_name')
                            ->get();

        return view('pages.food.food',[
            'children_profiles'=>$children_profiles,
            'food'=>$food,
            'programs'=>$programs
        ],$data);
    }





    //edit food

    public function GetEdit($id) 
    {
        $data['programs']=Programs::all();
        $data['mealtypes']=mealtype::all();
        $data['quantytifoods']=quantytifood::all();
        $data['itemfoods']=itemfood::all();
        $data['foods']=food::find($id);
        $data['foodItemName'] = DB::table('food_food_items')->where('id_food',$id)->pluck('id_food_items');
        $data['foodItemNames'] = DB::table('food_food_items')->where('id_food',$id)->pluck('id_food_items')->toArray();
       //dd($data);
        return view('pages.food.food.edit_food',$data);
    }
  

    public function PostEdit(request $request, $id) 
    {
       // dd($request->all());
        if($request->programs==null)
        {
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Pleasea choose program !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Bạn chưa chọn lớp !')->withInput();
            }
            
        }
        elseif ($request->mealtype==null) {
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Pleasea choose meal type !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Bạn chưa chọn loại bũa ăn !')->withInput();
            }
           
        }
        elseif($request->qtyfood==null)
        {
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Pleasea choose quantity !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Bạn chưa chọn số lượng bữa ăn !')->withInput();
            }
           
        }
        elseif($request->food_name==null)
        {
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Pleasea choose food name !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Bạn chưa chọn món ăn !')->withInput();
            }
            
        }
        else 
        {
            
            $foods =food::find($id);
            $foods->meal_type = $request->mealtype;
            $foods->quantity = $request->qtyfood;
            $foods->id_program = $request->programs;
            // $foods->date_begin = carbon::parse($request->date_begin)->format('Y-m-d');
            // $foods->date_end = carbon::parse($request->date_end)->format('Y-m-d');
            $foods->save();
            $foodss = explode(',',$request->food_name);
            $mang=array();
            foreach ($foodss as $item)
            {
                $mang[]=$item;
            }
           $foods->food()->Sync($mang);
           if (\Lang::locale() == 'en') {
                 return redirect('kids-now/food/list')->with('success','Edit food success !')->withInput();
            }
            if (\Lang::locale() == 'vi') {
                return redirect('kids-now/food/list')->with('success','Sửa thực đơn thành công !')->withInput();
            }
           
        }
    }



    public function DeleteFood($id) 
    {
       food::destroy($id);
       if (\Lang::locale() == 'en') {
        return redirect('kids-now/food/list')->with('success','Delete food success !');
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/food/list')->with('success','Xóa thực đơn thành công !');
        }
       
    }


















    //--------------------------danh sách loại bữa ăn----------------------
    public function GetListMenuMealType() 
    {
        $data['mealtypes']=mealtype::all();
        return view('pages.food.meal_type.list_meal_type',$data);
    }
    //thêm
    public function GetAddMenuMealType() 
    {
        return view('pages.food.meal_type.add_meal_type');
    }

    public function PostAddMenuMealType(MealTypeRequest $request) 
    {
        $meal = new mealtype;
        $meal->name = $request->name;
        $meal->save();
        if (\Lang::locale() == 'en') {
            return redirect('kids-now/food/menu-meal-type')->with('success','Add meal type '.$request->name.' success !')->withInput();
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/food/menu-meal-type')->with('success','Thêm loại bữa ăn '.$request->name.' thành công !')->withInput();
        }
        

    }
    //sửa
    public function GetEditMenuMealType($id) 
    {
        $data['mealtype']=mealtype::find($id);
        return view('pages.food.meal_type.edit_meal_type',$data);
    }
    public function PostEditMenuMealType(EditMealTypeRequest $request,$id) 
    {
        $meal=mealtype::find($id);
        $meal->name = $request->name;
        $meal->save();
        if (\Lang::locale() == 'en') {
            return redirect('kids-now/food/menu-meal-type')->with('success','Edit meal type '.$request->name.' success !')->withInput();
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/food/menu-meal-type')->with('success','Sửa loại bữa ăn '.$request->name.' thành công !')->withInput();
        }
        
    }


    //xóa
    public function DeleteMenuMealType($id) 
    {
        mealtype::destroy($id);
        if (\Lang::locale() == 'en') {
            return redirect()->back()->with('success','Delete success !');
        }
        if (\Lang::locale() == 'vi') {
            return redirect()->back()->with('success','Xóa loại bữa ăn thành công !');
        }
        
       // return redirect('kids-now/food/menu-meal-type')->with('success','Delete success');
    }






    //------------------------Số lượng bữa ăn-------------------------------------------------


    //danh sách
    public function GetListMenuQuantity()
    {
        $data['qtyfood']=quantytifood::all();
        return view('pages.food.quantity.list_quantity_food',$data);
    }

    //thêm
    public function GetAddMenuQuantity()
    {
        return view('pages.food.quantity.add_quantity_food');
    }

    public function PostAddMenuQuantity(QuantityRequest $request)
    {
        $qtyfood = new quantytifood;
        $qtyfood->name = $request->name;
        $qtyfood->save();
        if (\Lang::locale() == 'en') {
            return redirect('kids-now/food/menu-quantity')->with('success','Add quantity '.$request->name.' success !')->withInput();
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/food/menu-quantity')->with('success','Thêm số lượng bữa ăn '.$request->name.' thành công !')->withInput();
        }
        
    }


    //Sửa
    public function GetEditMenuQuantity($id_qty)
    {
        $data['qtyfood']=quantytifood::find($id_qty);
        return view('pages.food.quantity.edit_quantity_food',$data);
    }


    public function PostEditMenuQuantity(EditQuantityRequest $request ,$id_qty)
    {
        $qtyfood=quantytifood::find($id_qty);
        $qtyfood->name = $request->name;
        $qtyfood->save();
        if (\Lang::locale() == 'en') {
            return redirect('kids-now/food/menu-quantity')->with('success','Edit quantity '.$request->name.' success !')->withInput();
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/food/menu-quantity')->with('success','Sửa số lượng bữa ăn '.$request->name.' thành công !')->withInput();
        }
        
    }


    //Xóa
    public function DeleteMenuQuantity($id_qty)
    {
        quantytifood::destroy($id_qty);
        if (\Lang::locale() == 'en') {
            return redirect()->back()->with('success','Delete success !');
        }
        if (\Lang::locale() == 'vi') {
            return redirect()->back()->with('success','Xóa số lượng thành công !');
        }
        
        //return redirect('kids-now/food/menu-quantity')->with('success','Delete success');
    }
















  //--------------------------danh sách tên món ăn----------------------
    public function GetListMenuFoodName() 
    {
        $data['foodnames']=itemfood::all();
        return view('pages.food.food_name.list_food_name',$data);
    }
  
    //thêm
    public function GetAddMenuFoodName() 
    {
        return view('pages.food.food_name.add_food_name');
    }
    public function PostAddMenuFoodName(FoodNameRequest $request) 
    {
        $foodname=new itemfood;
        $foodname->food_name = $request->food_name;
        $foodname->save();
        if (\Lang::locale() == 'en') {
            return redirect('kids-now/food/menu-food-name')->with('success','Add food name '.$request->food_name.' success !')->withInput();
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/food/menu-food-name')->with('success','Thêm món ăn '.$request->food_name.' thành công !')->withInput();
        }
        
    }

    //sửa
    public function GetEditMenuFoodName($id_food_name) 
    {
        $data['foodname']=itemfood::find($id_food_name);
        return view('pages.food.food_name.edit_food_name',$data);
    }

    public function PostEditMenuFoodName(FoodNameRequest $request,$id_food_name) 
    { 
        $food=itemfood::find($id_food_name);
        $food->food_name = $request->food_name;
        $food->save();
        if (\Lang::locale() == 'en') {
            return redirect('kids-now/food/menu-food-name')->with('success','Edit food name '.$request->food_name.' success !');
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/food/menu-food-name')->with('success','Sửa món ăn '.$request->food_name.' thành công !');
        }
        
    }
    // xoa
    public function DeleteFoodName($id_food_name) 
    {
        itemfood::destroy($id_food_name);
        if (\Lang::locale() == 'en') {
            return redirect()->back()->with('success','Delete success !');
        }
        if (\Lang::locale() == 'vi') {
            return redirect()->back()->with('success','Xóa món ăn thành công !');
        }
        
        //return redirect('kids-now/food/menu-food-name')->with('success','Delete success');
    }











}
