<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\models\Children_status;
use App\models\ChildrenProfiles;
use App\models\Programs;
use App\models\Photo;
use Carbon\Carbon;
use Illuminate\Support\Str;


class PhotoController extends Controller
{
    public function index(){
        $data['programs'] = Programs::all();
        $data['program'] = Programs::first();
        $data['id'] = $data['program']->id;
        return view('pages.photos.index',$data);
    }
    public function show($id){
        $data['programs'] = Programs::all();
        $program = Programs::find($id);
        $data['children_profiles'] = $program->program_chil;
        $day = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
        $data['dayupdate'] =  date('Y-m-d', strtotime($day));
        $data['id'] = $id;
        
        return view('pages.photos.index',$data);
    }
    
    public function postAdd(Request $req,$id){
        $validation_vi = [
            'files.required' => 'Vui lòng chọn ảnh !',
            'children_id.required' => 'Vui lòng chọn trẻ !',
        ];

        $validation_en = [
            'files.required' => 'Please choose photos !',
            'children_id.required' => 'Please choose childrens !',
        ];

        $this->validate($req,
            [
                'files' => 'required',
                'children_id' => 'required',
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);
        // explode id ChildrenProfiles
        $children_id = explode(',', $req->children_id);
        if(empty($req->children_id)){
            return redirect()->back()->with('danger',app()->getLocale() == 'vi' ? 'Vui lòng chọn trẻ !' : 'Please choose children !')->withInput();
        }else{
            //check photo files
            if ($req->hasFile('files')){
                $array_image = [];
                foreach ($req->file('files') as $file_name){
                    $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                    array_push($array_image, $uniqueFileName);
                    $file_name->move(storage_path('app/public/photo_files/') , $uniqueFileName);
                }
            }
            // add photo for childrens
            foreach($children_id as $child_id){
                $photo = new Photo;         
                $photo->image = implode('/*endfile*/',$array_image);
                $photo->imageable_id = $child_id;
                $photo->imageable_type = 'App\models\ChildrenProfiles';
                $photo->save();
            }
        }
        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Gửi ảnh thành công !' : 'Photo sent successfully !')->withInput();
    }
}
