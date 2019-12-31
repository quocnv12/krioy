<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreHeathRequests;
use App\models\ChildrenProfiles;
use App\models\HealthModel;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthController extends Controller
{
    public function index(){
        $health = HealthModel :: paginate(4);

        return view('pages.heath.list', compact('health'));
    }
   
    public function create(){
        $health = HealthModel :: all();


        return view('pages.heath.heath', compact('health'));
    }
    public function getChitiet(Request $req){
        $chitiet = HealthModel::where('id', $req->id)->first();

        return view('pages.heath.select_health',compact('chitiet'));

    }



    public function store(StoreHeathRequests $request)
    {
        if ($request->hasFile('image')) {

            $file = $request->image;

            //getClientOriginalName() lấy tên file
            $file_name = $file->getClientOriginalName();

            //getMimeType lấy kiểu file

            $file_type = $file->getMimeType();

            // $file->getSize() lấy size ảnh  theo bytes 1mb =1048576b

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                if ($file_size <= 1048576) {
                    $file_name = date("D-M-Y") . '-' . rand() . '-' . $file_name;
                    if ($file->move('images', $file_name)) {
                        $data = $request->all();
                        $data['image'] = $file_name;
                        HealthModel::create($data);
                        return redirect()->route('health.index')->with('thongbao', 'Đã thêm thành công');


                    }

                } else {
                    return back()->with('error', 'Bạn không thể upload ảnh quá lớn 1 MB');
                }
            } else {
                return back()->with('error', 'File bạn chọn phải là file ảnh');
            }


        } else {
            return back()->with('error', 'Bạn chưa chọn ảnh minh họa cho sản phẩm');
        }

    }

    public function show(){

    }
    public function edit($id){

        $health=HealthModel::find($id);
        return view('pages.heath.edit',compact('health'));

    }



    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            "frist_name"=>"required|min:2|max:255",
            "last_name"=>"required|min:2|max:255",
            "sick"=>"required|min:2|max:255",
            "growth_height"=>"required|min:2",
            "growth_weight"=>"required|min:2",
            "medicine"=>"required|min:2|max:255",
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('pages.heath.edit',$id)
                ->withErrors($validator)
                ->withInput();
        }
        $health = HealthModel::find($id);
        $health->frist_name = $request->frist_name;
        $health->last_name = $request->last_name;
        $health->sick = $request->sick;
        $health->growth_height = $request->growth_height;
        $health->growth_weight = $request->growth_weight;
        $health->medicine = $request->medicine;
        $health->save();
        return view('pages.heath.list')->with(['success','thongbao','Sửa thành công']);






    }
    public  function destroy($id){
        $health = HealthModel::find($id);
        $health->delete();
        return view('pages.heath.list');
    }

}
