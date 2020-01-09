<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreHeathRequests;
use App\models\ChildrenProfiles;
use App\models\HealthModel;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HealthController extends Controller
{
    public function getList(){
        $health = HealthModel :: paginate(4);

        return view('pages.heath.list', compact('health'));
    }
    public function getChild(){
        $health = ChildrenProfiles::all();
        return view('pages.heath.select_health', compact('health'));
    }
    public function getAdd(){
        $health = HealthModel::all();
        return view('pages.heath.heath', compact('health'));
    }
    public function postAdd(Request $request){
        $health = new HealthModel;
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(
            base_path(). 'images/'.$imageName
        );
        $health->sick= $request->sick;
        $health->medicine= $request->medicine;
        $health->growth_height= $request->growth_height;
        $health->growth_weight= $request->growth_weight;
        $health->incident= $request->incident;
        $health->save();
        return redirect()->route('admin.health.list')->with(['flash_level'=>'success','flash_message'=>'Thêm tin  thành công!!!']);

    }

   public function getEdit($id){
        $health = DB::table('health')->where('id',$id)->first();
        return view('pages.heath.edit', compact('health'));
   }
   public function postEdit(Request $request, $id){
        $image = $request->image;
        $img_current ='images/'.$request->fImageCurrent;
       if(!empty($image)) {
           $filename= $image->getClientOriginalName();
           DB::table('health')->where('id', $id)
               ->update([
                   'sick'=>$request->sick,
                   'medicine'=>$request->medicine,
                   'growth_height'=>$request->growth_height,
                   'growth_weight'=>$request->growth_weight,
                   'incident'=>$request->incident,
                   'image'=>$filename
               ]);

           $image ->move(base_path() . 'images/', $filename);
           File::delete($img_current);
       }else {
           DB::table('health')->where('id', $id)
               ->update([
                   'sick'=>$request->sick,
                   'medicine'=>$request->medicine,
                   'growth_height'=>$request->growth_height,
                   'growth_weight'=>$request->growth_weight,
                   'incident'=>$request->incident,
               ]);
       }

       return redirect()->route('admin.heath.list')->with(['flash_level'=>'success','flash_message'=>'Edit tin tuyển dụng thành công!!!']);
   }

    public function getDelete($id){
        $health= DB::table('health')->where('id',$id)->delete();
        return redirect()->route('admin.health.list', compact('health'))->with(['flash_level'=>'success','flash_message'=>'Del tin tuyển dụng thành công!!!']);
    }
    public function getSearch(Request $req){

        $search = DB::table('children_profiles as a')
            ->where('first_name','like','%'.$req->key.'%')
            ->orWhere('last_name','like','%'.$req->key.'%')
            ->orWhere('sick','like','%'.$req->key.'%')
            ->orWhere('growth_height','like','%'.$req->key.'%')
            ->orWhere('growth_weight','like','%'.$req->key.'%')
            ->orWhere('incident','like','%'.$req->key.'%')
            ->join('health as b', 'a.id','=','b.id_children')
            ->select('a.*','b.*')
            ->paginate(5);
        return view('pages.heath.search', compact('search'));
    }
    public function postSearch(Request $req){


        $search = DB::table('children_profiles as a')
            ->where('first_name','like','%'.$req->key.'%')
            ->orWhere('last_name','like','%'.$req->key.'%')
            ->orWhere('sick','like','%'.$req->key.'%')
            ->orWhere('growth_height','like','%'.$req->key.'%')
            ->orWhere('growth_weight','like','%'.$req->key.'%')
            ->orWhere('incident','like','%'.$req->key.'%')
            ->join('health as b', 'a.id','=','b.id_children')
            ->select('a.*','b.*')


            ->paginate(5);
        return view('pages.heath.search', compact('search'));

    }



}
