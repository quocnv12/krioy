<?php

namespace App\Http\Controllers\Admin;

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

class HealthController extends Controller
{
    public function getList(){
        $health = HealthModel :: all();

        return view('pages.heath.list', compact('health'));
    }
    public function getChild(){
        $health = ChildrenProfiles::all();
        return view('pages.heath.select_health', compact('health'));
    }
    public function postChild(Request $request, $id){
        $childrent = DB::table('children_profiles')->where('id',$id)->first();
        return view('pages.heath.heath', compact('childrent'));
    }
    public function getAdd(){
        $health = HealthModel::all();
        $programs = Programs::all();
        return view('pages.heath.heath', compact('health','programs'));
    }
    public function postAdd(Request $request)
    {
        if($request->sick==null)
        {
            return redirect()->back()->with('thongbao1','Pleasea choose sick !')->withInput();
        }
        elseif ($request->medicine==null) {
            return redirect()->back()->with('thongbao2','Pleasea choose  medicine !')->withInput();
        }
        elseif($request->growth_height==null)
        {
            return redirect()->back()->with('thongbao3','Pleasea choose growth_height !')->withInput();
        }
        elseif($request->incident==null)
        {
            return redirect()->back()->with('thongbao4','Pleasea choose incident !')->withInput();
        }
        elseif($request->blood_group==null)
        {
            return redirect()->back()->with('thongbao5','Pleasea choose blood_group !')->withInput();
        }
        else {

            $image = $request->image;
            $img_current = 'images/' . $request->image;
            if (!empty($image)) {
                $filename = $image->getClientOriginalName();
                $health = new HealthModel();
                $health->id_children = $request->children_health;


                $health->sick = $request->sick;
                $health->medicine = $request->medicine;
                $health->growth_height = $request->growth_height;
                $health->growth_weight = $request->growth_weight;
                $health->incident = $request->incident;
                $health->blood_group = $request->blood_group;
                $health->image = $request->image;
                $health->file_pdf = $request->file_pdf;
                $health->save();

                $image->move(base_path() . 'images/', $filename);
                File::delete($img_current);
            } else {
                $health = new HealthModel();
                $health->id_children = $request->children_health;

                $health->sick = $request->sick;
                $health->medicine = $request->medicine;
                $health->growth_height = $request->growth_height;
                $health->growth_weight = $request->growth_weight;
                $health->incident = $request->incident;

                $health->blood_group = $request->blood_group;
                $health->file_pdf = $request->file_pdf;
                $health->save();
            }


            if ($request->programs) {
                //string to array
                $programs = explode(',', $request->programs);
                //luu vao bang children_programs
                foreach ($programs as $program) {
                    $children_program = new ChildrenProgram();
                    $children_program->id_children = $children_id;
                    $children_program->id_program = $program;
                    $children_program->save();
                }
                $children_program->save();
            }
            return redirect()->back()->with('notify', 'Add successfully');

        }
    }

    public function getEdit($id){
        $health = HealthModel::find($id);
        $childrent = DB::table('children_profiles')->where('id',$id)->first();
        return view('pages.heath.edit', compact('health','childrent'));
    }
    public function postEdit(Request $request, $id)
    {

        if ($request->sick == null) {
            return redirect()->back()->with('thongbao1', 'Pleasea choose sick !')->withInput();
        } elseif ($request->medicine == null) {
            return redirect()->back()->with('thongbao2', 'Pleasea choose  medicine !')->withInput();
        } elseif ($request->growth_height == null) {
            return redirect()->back()->with('thongbao3', 'Pleasea choose growth_height !')->withInput();
        } elseif ($request->incident == null) {
            return redirect()->back()->with('thongbao4', 'Pleasea choose incident !')->withInput();
        } elseif ($request->blood_group == null) {
            return redirect()->back()->with('thongbao5', 'Pleasea choose blood_group !')->withInput();
        } else {
            $image = $request->image;
            $img_current = 'images/' . $request->fImageCurrent;
            if (!empty($image)) {
                $filename = $image->getClientOriginalName();
                $health = HealthModel::find($id);

                $health->sick = $request->sick;
                $health->medicine = $request->medicine;
                $health->growth_height = $request->growth_height;
                $health->growth_weight = $request->growth_weight;
                $health->incident = $request->incident;
                $health->image = $request->image;
                $health->save();

                $image->move(base_path() . 'images/', $filename);
                File::delete($img_current);
            } else {
                $health = HealthModel::find($id);

                $health->sick = $request->sick;
                $health->medicine = $request->medicine;
                $health->growth_height = $request->growth_height;
                $health->growth_weight = $request->growth_weight;
                $health->incident = $request->incident;
                $health->save();
            }


            return redirect()->back()->with('notify', 'Edit successfully');
        }
    }

    public function getDelete($id){
        $health= DB::table('health')->where('id',$id)->delete();
        return redirect()->back()->with('notify','Deleted file successfully');
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
    public function searchByName(Request $request)
    {
        $children_profiles = ChildrenProfiles::where('first_name', 'like', '%' . $request->get('q') . '%')
            ->orWhere('last_name', 'like', '%' . $request->get('q') . '%')
            ->orderBy('last_name')
            ->get();
        return response()->json($children_profiles);
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
        return view('pages.heath.heath',['children_profiles'=>$children_profiles,
            'observationtype'=>$observationtype,
            'programs'=>$programs]);
    }




}