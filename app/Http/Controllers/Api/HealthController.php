<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreHeathRequests;
use App\models\ChildrenProfiles;
use App\models\HealthModel;
use App\models\ObservationTypeModel;
use App\models\Programs;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HealthController extends Controller
{
    public function getList(){

        $health = HealthModel::orderBy('created_at','DESC')->get();
        return response()->json([
            'health'=>$health,
        ], 200);
    }

    public function view($id){
        $health = HealthModel::find($id);
        if ($id == 0){
            return view('pages.not-found.notfound');
        }
        $children_profiles = ChildrenProfiles::where('id',$health->id_children)->first();
        return response()->json([
            'health'=>$health,
            'children_profiles'=>$children_profiles
        ]);
    }

    public function getAdd(){
        $health = HealthModel::all();
        $programs = Programs::all();
        return response()->json([
            'health'=>$health,
            'programs'=>$programs
        ]);
    }

    public function postAdd(Request $request)
    {
        $validation_vi = [
            'children_health.required'  =>  'Vui lòng chọn trẻ',
        ];

        $validation_en = [
            'children_health.required'  =>  'Please choose children',
        ];

        $rules = [
            'children_health'   =>  'required',
            'sick'  =>  'nullable',
            'medicine'  =>  'nullable',
            'growth'  =>  'nullable',
            'incident'  =>  'nullable',
            'blood_group'  =>  'nullable',
        ];


        $validator = Validator::make($request->all(), $rules,app()->getLocale() == 'vi' ? $validation_vi : $validation_en);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $array_children = explode(',',$request->children_health);
        foreach($array_children as $children){
            $health = new HealthModel();

            $health->id_children = $children;
            $health->sick = $request->sick;
            $health->medicine = $request->medicine;
            $health->growth = $request->growth;
            $health->growth_height = $request->growth_height;
            $health->growth_weight = $request->growth_weight;
            $health->incident = $request->incident;
            $health->blood_group = $request->blood_group;

            if ($request->hasFile('clip_board')){
                $array_file = [];
                foreach ($request->file('clip_board') as $file_name){
                    $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                    array_push($array_file, $uniqueFileName);
                    $file_name->move(storage_path('app/public/clip_board/') , $uniqueFileName);
                }
                $health->clip_board = implode('/*endfile*/',$array_file);
            }

            $health->save();
        }
        return response()->json([
            'health'=>$health
        ]);
    }

    public function getEdit($id){
        $health = HealthModel::find($id);
        if (! $id){
            return response()->json(['message'=>'Not Found'], 404);
        }
        $children_profiles = ChildrenProfiles::where('id',$health->id_children)->first();
        return response()->json([
            'health'=>$health,
            'children_profiles'=>$children_profiles,
        ], 200);
    }

    public function postEdit(Request $request, $id)
    {
        $rules = [
            'sick'  =>  'nullable',
            'medicine'  =>  'nullable',
            'growth'  =>  'nullable',
            'incident'  =>  'nullable',
            'blood_group'  =>  'nullable',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $health = HealthModel::find($id);

        $health->sick = $request->sick;
        $health->medicine = $request->medicine;
        $health->growth = $request->growth;
        $health->growth_height = $request->growth_height;
        $health->growth_weight = $request->growth_weight;
        $health->incident = $request->incident;
        $health->blood_group = $request->blood_group;

        if ($request->hasFile('clip_board')){
            $old_array = explode('/*endfile*/',$health->clip_board);
            foreach ($request->file('clip_board') as $file_name){
                $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                array_push($old_array, $uniqueFileName);
                $file_name->move(storage_path('app/public/clip_board/') , $uniqueFileName);
            }
            $health->clip_board = implode('/*endfile*/',$old_array);
        }

        $health->save();

        return response()->json([
            'health'=>$health
        ],200);

    }

    public function getDelete($id){
        $health= HealthModel::find($id);
        if (!$id){
            return response()->json(['message'=>'Something wrong']);
        }else{
            if ($health->clip_board){
                $old_array = explode('/*endfile*/',$health->clip_board);
                foreach ($old_array as $key=>$value){
                    $file_path = 'app/public/clip_board/'.$value;
                    if ($file_path != 'app/public/clip_board/'){
                        unlink(storage_path($file_path));
                    }
                }
            }

            $health->delete();

            return response()->json(null, 204);
        }
    }

    public function searchByName(Request $request)
    {
        $children_profiles = ChildrenProfiles::where('first_name', 'like', '%' . $request->get('q') . '%')
            ->orWhere('last_name', 'like', '%' . $request->get('q') . '%')
            ->orderBy('last_name')
            ->get();
        return response()->json([
            'children_profiles'=>$children_profiles
        ], 200);
    }

    public function addSelectChild(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $children_profiles = ChildrenProfiles::find($request->id_children);

            if ($children_profiles){
                $output = '
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1" style="">
							    <div class="child-class" style="height: 120px;text-align: center;">
							        <div class="image">
                                        <img class="img-circle" onerror="this.src=\'images/Child.png\';" style="height: 80px" width="80" src="' . $children_profiles->image . '">
                                        <input type="hidden" value="' . $children_profiles->id . '">
                                        <button class="btn btn-xs btn-danger" type="button" onclick="deleteChild(' . $children_profiles->id . ')">X</button>
                                        <span class="limitText ng-star-inserted">' . $children_profiles->first_name . ' ' . $children_profiles->last_name . '</span>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                $(\'.btn-danger\').click(function() {
                                  $(this).parent(\'div\').parent(\'div\').parent(\'div\').hide();
                                })
                            </script>
                            ';
            }
            return Response($output);
        }
    }
    public function showChildrenInProgram($id){
        $observationtype = ObservationTypeModel::all();
        $programs = Programs::all();
        $children_profiles = DB::table('children_profiles')
            ->join('children_programs','children_profiles.id','=','children_programs.id_children')
            ->where('children_programs.id_program','=',$id)
            ->get();
        return response()->json([
            'children_profiles'=>$children_profiles,
            'observationtype'=>$observationtype,
            'programs'=>$programs
        ], 200);
    }

    public function displayClipboard($id,$name)
    {
        return response()->file(storage_path('app/public/clip_board/'.$name),[
            'Content-Disposition' => 'inline; filename="'. $name .'"']);
    }

    public function deleteClipboard($id,$name)
    {
        $health = HealthModel::find($id);
        if (!$health){
            return response()->json(['message'=>'Something wrong'], 404);
        }else {
            //chuoi cu
            $old_array = explode('/*endfile*/', $health->clip_board);

            $index = array_search($name, $old_array);
            array_splice($old_array, $index, 1);

            //cap nhat lai chuoi
            $health->clip_board = implode('/*endfile*/', $old_array);
            $health->save();

            //xoa file
            $file_path = storage_path('app/public/clip_board/' . $name);
            unlink($file_path);

            return response()->json(null, 204);
        }
    }
}
