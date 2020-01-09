<?php

namespace App\Http\Controllers\Admin;
use App\models\food\{itemfood,mealtype,quantytifood,food};
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        if($request->programs==null)
        {
            return redirect()->back()->with('thongbao1','Pleasea choose program !')->withInput();
        }
        elseif ($request->mealtype==null) {
            return redirect()->back()->with('thongbao2','Pleasea choose meal type !')->withInput();
        }
        elseif($request->qtyfood==null)
        {
            return redirect()->back()->with('thongbao3','Pleasea choose quantity !')->withInput();
        }
        elseif($request->food_name==null)
        {
            return redirect()->back()->with('thongbao4','Pleasea choose food name !')->withInput();
        }
        else 
        {
            $foods =new food;
            $foods->meal_type = $request->mealtype;
            $foods->quantity = $request->qtyfood;
            $foods->id_program = $request->programs;
            $foods->save();
            $foodss = explode(',',$request->food_name);
            $mang=array();
            foreach ($foodss as $item)
            {
                $mang[]=$item;
            }
           $foods->food()->Attach($mang);
           return redirect()->back()->with('thongbao','Send food success !')->withInput();
        }
     
        
    }

    //danh sách food
    public function GetList() 
    {
        $data['foods']=food::orderBy('id','ASC')->get();
        return view('pages.food.food.list_food',$data);
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

    public function PostAddMenuMealType(request $request) 
    {
        $this->validate($request,
        [
          'name' => 'required|unique:meal_type,name'
        ],
        [
            'name.required' => 'Please input name !',
            'name.unique' => 'Meal type already exist !'
        ]);

        $meal = new mealtype;
        $meal->name = $request->name;
        $meal->save();
        return redirect('kids-now/food/menu-meal-type')->with('thongbao','Add meal type '.$request->name.'success !')->withInput();


    }
    //sửa
    public function GetEditMenuMealType($id) 
    {
        $data['mealtype']=mealtype::find($id);
        return view('pages.food.meal_type.edit_meal_type',$data);
    }
    public function PostEditMenuMealType(request $request,$id) 
    {
        $this->validate($request,
        [
          'name' => 'required|unique:meal_type,name,'.$id
        ],
        [
            'name.required' => 'Please input name !',
            'name.unique' => 'Meal type already exist !'
        ]);
        $meal=mealtype::find($id);
        $meal->name = $request->name;
        $meal->save();
        return redirect('kids-now/food/menu-meal-type')->with('thongbao','Edit meal type '.$request->name.' success !')->withInput();
    }


    //xóa
    public function DeleteMenuMealType($id) 
    {
        mealtype::destroy($id);
        return redirect('kids-now/food/menu-meal-type')->with('delete','Delete success !');
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

    public function PostAddMenuQuantity(request $request)
    {
        $this->validate($request,
        [
          'name' => 'required|unique:quantity_food,name'
        ],
        [
            'name.required' => 'Please input name !',
            'name.unique' => 'Quantity already exist !'
        ]);

        $qtyfood = new quantytifood;
        $qtyfood->name = $request->name;
        $qtyfood->save();
        return redirect('kids-now/food/menu-quantity')->with('thongbao','Add quantity '.$request->name.' success !')->withInput();
    }


    //Sửa
    public function GetEditMenuQuantity($id_qty)
    {
        $data['qtyfood']=quantytifood::find($id_qty);
        return view('pages.food.quantity.edit_quantity_food',$data);
    }


    public function PostEditMenuQuantity(request $request ,$id_qty)
    {
        $this->validate($request,
        [
          'name' => 'required|unique:quantity_food,name,'.$id_qty
        ],
        [
            'name.required' => 'Please input name !',
            'name.unique' => 'Quantity already exist !'
        ]);
        $qtyfood=quantytifood::find($id_qty);
        $qtyfood->name = $request->name;
        $qtyfood->save();
        return redirect('kids-now/food/menu-quantity')->with('thongbao','Edit quantity '.$request->name.' success !')->withInput();
    }


    //Xóa
    public function DeleteMenuQuantity($id_qty)
    {
        quantytifood::destroy($id_qty);
        return redirect('kids-now/food/menu-quantity')->with('delete','Delete success !');
    }
















  //--------------------------danh sách tên món ăn----------------------
    public function GetListMenuFoodName() 
    {
        $data['foodnames']=itemfood::paginate(15);
        return view('pages.food.food_name.list_food_name',$data);
    }
    //tim  kiem
    public function SearchByName(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $itemfood = itemfood::where('food_name', 'like', '%' . $request->search . '%')->get();
            if ($itemfood) {
                if(count($itemfood)>=1){
                            echo   '<table border="0">
                                        <tbody>
                                            <tr class="td1" >
                                                <th>STT</th>
                                                <th>Food Name</th>
                                                <th>Hành Động</th>
                                            </tr>';
                                    foreach ($itemfood as $key => $item) {
                                        $output .= 
                                        '<tr style="text-align: center;line-height: 50px;">
                                            <td  style="width: 200px;">' . $item->id . '</td>
                                            <td>' . $item->food_name . '</td>
                                            <td style="width: 200px;">
                                                <a style="margin:0px;"
                                                    href="kids-now/food/menu-food-name/edit/'.$item->id.'"
                                                    class="btn btn-warning btn-cons"" title=" Edit Meal Type"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="kids-now/food/menu-food-name/delete/'.$item->id.'"
                                                        onclick="return del()"
                                                    style="margin:0px;" class="btn btn-danger btn-cons"
                                                    title="Delete Meal Type"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                        </tr>';
                                        }
                            echo    '</tbody>
                                </table>';
            }
            else {
                echo   '<table border="0">
                                        <tbody>
                                            <tr class="td1" >
                                                <th style="width:200px" >STT</th>
                                                <th>Food Name</th>
                                                <th style="width:200px">Hành Động</th>
                                            </tr>';
                echo    '<p style="margin:10px">Không tìm thấy tên món ăn </p>';
            }
        }
            return Response($output);
           
       }
     
    }

    //thêm
    public function GetAddMenuFoodName() 
    {
        return view('pages.food.food_name.add_food_name');
    }
    public function PostAddMenuFoodName(request $request) 
    {
        $this->validate($request,
        [
          'food_name' => 'required|unique:food_items,food_name'
        ],
        [
            'food_name.required' => 'Please input food name !',
            'food_name.unique' => 'Food name already exist !'
        ]);

        $foodname=new itemfood;
        $foodname->food_name = $request->food_name;
        $foodname->save();
        return redirect('kids-now/food/menu-food-name')->with('thongbao','Add food name '.$request->food_name.' success !')->withInput();
    }

    //sửa
    public function GetEditMenuFoodName($id_food_name) 
    {
        $data['foodname']=itemfood::find($id_food_name);
        return view('pages.food.food_name.edit_food_name',$data);
    }

    public function PostEditMenuFoodName(request $request,$id_food_name) 
    {
 
        $this->validate($request,
        [
          'food_name' => 'required|unique:food_items,food_name,'.$id_food_name
        ],
        [
            'food_name.required' => 'Please input food name !',
            'food_name.unique' => 'Food name already exist !'
        ]);
     
        $food=itemfood::find($id_food_name);
        $food->food_name = $request->food_name;
        $food->save();
        return redirect('kids-now/food/menu-food-name')->with('thongbao','Edit food name '.$request->food_name.' success !');
    }
    // xoa
    public function DeleteFoodName($id_food_name) 
    {
        itemfood::destroy($id_food_name);
        return redirect('kids-now/food/menu-food-name')->with('delete','Delete success !');
    }











}
