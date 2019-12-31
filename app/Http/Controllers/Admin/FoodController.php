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
            return redirect()->back()->with('thongbao1','Bạn chưa chọn lớp !')->withInput();
        }
        elseif ($request->mealtype==null) {
            return redirect()->back()->with('thongbao2','Bạn chưa chọn loại bữa ăn !')->withInput();
        }
        elseif($request->qtyfood==null)
        {
            return redirect()->back()->with('thongbao3','Bạn chưa chọn số lượng !')->withInput();
        }
        elseif($request->food_name==null)
        {
            return redirect()->back()->with('thongbao4','Bạn chưa chọn tên món ăn !')->withInput();
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
           return redirect()->back()->with('thongbao','Gửi thực đơn thành công !')->withInput();
        }
     
        
    }

  




















    //--------------------------danh sách loại bữa ăn----------------------
    public function GetListMenuMealType() 
    {
        $data['mealtypes']=mealtype::all();
        return view('pages.food.loai_bua_an.list_meal_type',$data);
    }
    //thêm
    public function GetAddMenuMealType() 
    {
        return view('pages.food.loai_bua_an.add_meal_type');
    }

    public function PostAddMenuMealType(request $request) 
    {
        $this->validate($request,
        [
          'name' => 'required|unique:meal_type,name'
        ],
        [
            'name.required' => 'Không để được trống trường này !',
            'name.unique' => 'Loại bữa ăn đã tồn tại !'
        ]);

        $meal = new mealtype;
        $meal->name = $request->name;
        $meal->save();
        return redirect('kids-now/food/menu-meal-type')->with('thongbao','Thêm loại bưa ăn '.$request->name.' thành công !')->withInput();


    }
    //sửa
    public function GetEditMenuMealType($id) 
    {
        $data['mealtype']=mealtype::find($id);
        return view('pages.food.loai_bua_an.edit_meal_type',$data);
    }
    public function PostEditMenuMealType(request $request,$id) 
    {
        $this->validate($request,
        [
          'name' => 'required|unique:meal_type,name,'.$id
        ],
        [
            'name.required' => 'Không để được trống trường này !',
            'name.unique' => 'Loại bữa ăn này đã có !'
        ]);
        $meal=mealtype::find($id);
        $meal->name = $request->name;
        $meal->save();
        return redirect('kids-now/food/menu-meal-type')->with('thongbao','Sửa loại bữa ăn '.$request->name.' thành công !')->withInput();
    }


    //xóa
    public function DeleteMenuMealType($id) 
    {
        mealtype::destroy($id);
        return redirect('kids-now/food/menu-meal-type')->with('delete','Xóa  thành công !');
    }






    //------------------------Số lượng bữa ăn-------------------------------------------------


    //danh sách
    public function GetListMenuQuantity()
    {
        $data['qtyfood']=quantytifood::all();
        return view('pages.food.so_luong.list_quantity_food',$data);
    }

    //thêm
    public function GetAddMenuQuantity()
    {
        return view('pages.food.so_luong.add_quantity_food');
    }

    public function PostAddMenuQuantity(request $request)
    {
        $this->validate($request,
        [
          'name' => 'required|unique:quantity_food,name'
        ],
        [
            'name.required' => 'Không để được trống trường này !',
            'name.unique' => 'Số lượng bữa ăn đã tồn tại !'
        ]);

        $qtyfood = new quantytifood;
        $qtyfood->name = $request->name;
        $qtyfood->save();
        return redirect('kids-now/food/menu-quantity')->with('thongbao','Thêm số lượng bưa ăn '.$request->name.' thành công !')->withInput();
    }


    //Sửa
    public function GetEditMenuQuantity($id_qty)
    {
        $data['qtyfood']=quantytifood::find($id_qty);
        return view('pages.food.so_luong.edit_quantity_food',$data);
    }


    public function PostEditMenuQuantity(request $request ,$id_qty)
    {
        $this->validate($request,
        [
          'name' => 'required|unique:quantity_food,name,'.$id_qty
        ],
        [
            'name.required' => 'Không để được trống trường này !',
            'name.unique' => 'Loại bữa ăn này đã có !'
        ]);
        $qtyfood=quantytifood::find($id_qty);
        $qtyfood->name = $request->name;
        $qtyfood->save();
        return redirect('kids-now/food/menu-quantity')->with('thongbao','Sửa loại bữa ăn '.$request->name.' thành công !')->withInput();
    }


    //Xóa
    public function DeleteMenuQuantity($id_qty)
    {
        quantytifood::destroy($id_qty);
        return redirect('kids-now/food/menu-quantity')->with('delete','Xóa số lượng bưa ăn thành công !');
    }
















  //--------------------------danh sách tên món ăn----------------------
    public function GetListMenuFoodName() 
    {
        $data['foodnames']=itemfood::paginate(15);
        return view('pages.food.ten_mon_an.list_food_name',$data);
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
        return view('pages.food.ten_mon_an.add_food_name');
    }
    public function PostAddMenuFoodName(request $request) 
    {
        $this->validate($request,
        [
          'food_name' => 'required|unique:food_items,food_name'
        ],
        [
            'food_name.required' => 'Không để được trống trường này !',
            'food_name.unique' => 'Tên món ăn này đã có !'
        ]);

        $foodname=new itemfood;
        $foodname->food_name = $request->food_name;
        $foodname->save();
        return redirect('kids-now/food/menu-food-name')->with('thongbao','Thêm món ăn '.$request->food_name.' thành công !')->withInput();
    }

    //sửa
    public function GetEditMenuFoodName($id_food_name) 
    {
        $data['foodname']=itemfood::find($id_food_name);
        return view('pages.food.ten_mon_an.edit_food_name',$data);
    }

    public function PostEditMenuFoodName(request $request,$id_food_name) 
    {
 
        $this->validate($request,
        [
          'food_name' => 'required|unique:food_items,food_name,'.$id_food_name
        ],
        [
            'food_name.required' => 'Không để được trống trường này !',
            'food_name.unique' => 'Tên món ăn này đã có !'
        ]);
     
        $food=itemfood::find($id_food_name);
        $food->food_name = $request->food_name;
        $food->save();
        return redirect('kids-now/food/menu-food-name')->with('thongbao','Sửa món ăn '.$request->food_name.' thành công !');
    }
    // xoa
    public function DeleteFoodName($id_food_name) 
    {
        itemfood::destroy($id_food_name);
        return redirect('kids-now/food/menu-food-name')->with('delete','Xóa  thành công !');
    }











}
