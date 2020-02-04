<?php

namespace App\Http\Controllers\Api;

use App\models\ChildrenProfiles;

use App\models\ChildrenProgram;
use App\models\Programs;
use App\models\staff\StaffProfiles;
use App\models\StaffProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProgramsController extends Controller
{

    public function index()
    {
        $programs = DB::table('programs')
            ->leftJoin('children_programs', 'programs.id', '=', 'children_programs.id_program')
            ->select(['programs.program_name', 'programs.id'])
            ->selectRaw('count(children_programs.id_children) AS total_children')
            ->groupBy(['programs.program_name', 'programs.id'])
            ->orderBy('programs.program_name')
            ->simplePaginate(8);

        if (!$programs){
            return response()->json([
                'Something wrong'
            ], 404);
        }else{
            return response()->json([
                'programs' => $programs
            ], 200);
        }

    }


    public function create()
    {
        return response()->json(null, 200);
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'program_fee'   =>  'numeric|min:0'
            ],
            [
                'program_fee.numeric'   =>  'Program fee is invalid',
                'program_fee.min'       =>  'Program fee is invalid',
            ]);

        $programs = Programs::create($request->all());
        $programs->schedule = $request->schedule;
        $programs->save();

        //solve schedule
        $all_schedule = $request->schedule;
        $arr = [];
        foreach ((array)$all_schedule as $schedule) {
            array_push($arr, $schedule);
        }
        $arr_all_schedule = implode(",", $arr);  //turn array to string to save in database
        $programs->schedule = $arr_all_schedule;

        $programs->save();


        //lay id cua program vua tao moi xong
        $program_id = $programs->id;

        if ($request->array_all_children !== null) {
            //string to array
            $array_all_children = explode(',', $request->array_all_children);

            //luu vao bang children_programs
            foreach ($array_all_children as $children) {
                $children_program = new ChildrenProgram();
                $children_program->id_children = $children;
                $children_program->id_program = $program_id;
                $children_program->save();
            }
            $children_program->save();
        }

        if ($request->array_all_staff !== null) {
            //string to array
            $array_all_staff = explode(',', $request->array_all_staff);
            //luu vao bang children_programs
            foreach ($array_all_staff as $staff) {
                $staff_program = new StaffProgram();
                $staff_program->id_staff = $staff;
                $staff_program->id_program = $program_id;
                $staff_program->save();
            }
            $staff_program->save();
        }

        return response()->json([
            'programs'=>$programs
        ], 201);
    }


    public function show($id)
    {
        $program = Programs::find($id);

        if (!$program){
            return response()->json('Something wrong', 404);
        }else {
            $array_schedule = explode(',', $program->schedule);  //string to array

            $children_profiles = DB::table('children_profiles')
                ->join('children_programs', 'children_profiles.id', '=', 'children_programs.id_children')
                ->select(['*'])
                ->where('children_programs.id_program', '=', $id)
                ->get();

            $staff_profiles = DB::table('staff_profiles')
                ->join('staff_programs', 'staff_profiles.id', '=', 'staff_programs.id_staff')
                ->select(['*'])
                ->where('staff_programs.id_program', '=', $id)
                ->get();

            return response()->json([
                'program' => $program,
                'array_schedule' => $array_schedule,
                'children_profiles' => $children_profiles,
                'staff_profiles' => $staff_profiles
            ], 200);
        }
    }


    public function edit($id)
    {
        $program = Programs::find($id);
        if (! $program){
            return response()->json('Something wrong', 404);
        }else {
            $children_in_program = DB::table('children_profiles')
                ->join('children_programs', 'children_profiles.id', '=', 'children_programs.id_children')
                ->select('*')
                ->where('id_program', '=', $id)
                ->get();

            $staff_in_program = DB::table('staff_profiles')
                ->join('staff_programs', 'staff_profiles.id', '=', 'staff_programs.id_staff')
                ->select('*')
                ->where('id_program', '=', $id)
                ->get();

            $array_children_old = [];
            foreach ($children_in_program as $key => $value) {
                array_push($array_children_old, $value->id);
            }

            $array_staff_old = [];
            foreach ($staff_in_program as $key => $value) {
                array_push($array_staff_old, $value->id);
            }

            $array_schedule_choose = explode(',', $program->schedule);
            return response()->json([
                'program' => $program,
                'children_in_program' => $children_in_program,
                'array_children_old' => $array_children_old,
                'staff_in_program' => $staff_in_program,
                'array_staff_old' => $array_staff_old,
                'array_schedule_choose' => $array_schedule_choose
            ], 200);
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'program_fee'   =>  'numeric|min:0'
            ],
            [
                'program_fee.numeric'   =>  'Program fee is invalid',
                'program_fee.min'       =>  'Program fee is invalid',
            ]);

        $programs = Programs::findOrFail($id);

        if (! $programs){
            return response()->json('Something wrong', 404);
        }else {
            $programs->update($request->all());

            $all_schedule = $request->schedule_new;
            $arr = [];
            foreach ((array)$all_schedule as $schedule) {
                array_push($arr, $schedule);
            }
            $arr_all_schedule = implode(",", $arr);  //turn array to string to save in database
            $programs->schedule = $arr_all_schedule;

            $programs->save();

            //neu thay doi children
            if ($request->array_children_new) {
                //array chua cac id children trong program
                $array_children_old = [];
                $children_old = explode(',', $request->array_children_old);    //string to array
                foreach ($children_old as $item) {
                    array_push($array_children_old, $item);
                }
                //array chua cac id children moi them vao program
                $array_children_new = [];
                $children_new = explode(',', $request->array_children_new);    //string to array
                foreach ($children_new as $item) {
                    array_push($array_children_new, $item);
                }
                //so sanh array cu va moi
                $children_add = array_diff($array_children_new, $array_children_old);
                $children_remove = array_diff($array_children_old, $array_children_new);
                //them record children_programs
                foreach ($children_add as $children_id) {
                    $children_programs = new ChildrenProgram();
                    $children_programs->id_program = $id;
                    $children_programs->id_children = $children_id;
                    $children_programs->save();
                }
                //xoa record children_programs
                foreach ($children_remove as $children_id) {
                    $children_programs = ChildrenProgram::where([['id_program', '=', $id], ['id_children', '=', $children_id]]);
                    $children_programs->delete();
                }
            }

            //neu thay doi staff
            if ($request->array_staff_new) {
                //array chua cac id children trong program
                $array_staff_old = [];
                $staff_old = explode(',', $request->array_staff_old);    //string to array
                foreach ($staff_old as $item) {
                    array_push($array_staff_old, $item);
                }
                //array chua cac id children moi them vao program
                $array_staff_new = [];
                $staff_new = explode(',', $request->array_staff_new);    //string to array
                foreach ($staff_new as $item) {
                    array_push($array_staff_new, $item);
                }
                //so sanh array cu va moi
                $staff_add = array_diff($array_staff_new, $array_staff_old);
                $staff_remove = array_diff($array_staff_old, $array_staff_new);
                //them record children_programs
                foreach ($staff_add as $staff_id) {
                    $staff_programs = new StaffProgram();
                    $staff_programs->id_program = $id;
                    $staff_programs->id_staff = $staff_id;
                    $staff_programs->save();
                }
                //xoa record children_programs
                foreach ($staff_remove as $staff_id) {
                    $staff_programs = StaffProgram::where([['id_program', '=', $id], ['id_staff', '=', $staff_id]]);
                    $staff_programs->delete();
                }
            }

            return response()->json([
                'programs' => $programs
            ], 200);
        }
    }


    public function destroy($id)
    {
        $programs = Programs::findOrFail($id);

        if (! $programs){
            return response()->json('Something wrong', 404);
        }else {
            $programs->delete();

            $programs = DB::table('programs')
                ->leftJoin('children_programs', 'programs.id', '=', 'children_programs.id_program')
                ->select(['programs.program_name', 'programs.id'])
                ->selectRaw('count(children_programs.id_children) AS total_children')
                ->groupBy(['programs.program_name', 'programs.id'])
                ->orderBy('programs.program_name')
                ->simplePaginate(8);

            return response()->json([
                'programs' => $programs
            ], 200);
        }
    }

    public function searchChildren(Request $request)
    {
        $children_profiles = ChildrenProfiles::where('first_name', 'like', '%' . $request->get('q') . '%')
            ->orWhere('last_name', 'like', '%' . $request->get('q') . '%')
            ->orderBy('last_name')
            ->get();

        return response()->json($children_profiles);
    }

    public function searchStaff(Request $request)
    {
        $staff_profiles = StaffProfiles::where('first_name', 'like', '%' . $request->get('q2') . '%')
            ->orWhere('last_name', 'like', '%' . $request->get('q2') . '%')
            ->orderBy('last_name')
            ->get();

        return response()->json($staff_profiles);
    }

    public function searchProgram(Request $request)
    {
        $programs = Programs::where('program_name', 'like', '%' . $request->get('q') . '%')
            ->orderBy('program_name')
            ->get();

        return response()->json($programs);
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
                                        <span class="delete-child" onclick="deleteChild(' . $children_profiles->id . ')" style="position: absolute; top: 0"><i class="fas fa-times-circle" style="color: red ; cursor: pointer"></i></span>
                                        <span class="limitText ng-star-inserted">' . $children_profiles->first_name . ' ' . $children_profiles->last_name . '</span>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                $(\'.delete-child\').click(function() {
                                  $(this).parent(\'div\').parent(\'div\').parent(\'div\').hide();
                                })
                            </script>
                            ';
            }
            return Response($output);
        }
    }

    public function addSelectStaff(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $staff_profiles = StaffProfiles::find($request->id_staff);

            if ($staff_profiles) {
                $output = '
                                <div _ngcontent-c19="" class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1" style="">
                                    <div _ngcontent-c19="" class="child-class" style="height: 120px;text-align: center;">
                                        <div _ngcontent-c9="" class="image">
                                            <img _ngcontent-c19="" class="img-circle" onerror="this.src=\'images/Staff.png\';" style="height: 80px" width="80" src="' . $staff_profiles->image . '">
                                            <input type="hidden" value="' . $staff_profiles->id . '">
                                            <span class="delete-staff" onclick="deleteStaff(' . $staff_profiles->id . ')" style="position: absolute; top: 0"><i class="fas fa-times-circle" style="color: red ; cursor: pointer"></i></span>
                                            <span _ngcontent-c19="" class="limitText ng-star-inserted">' . $staff_profiles->first_name . ' ' . $staff_profiles->last_name . '</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <script >
                                    $(\'.delete-staff\').click(function() {
                                      $(this).parent(\'div\').parent(\'div\').parent(\'div\').hide();
                                    })
                                </script>
                                ';
            }
            return Response($output);
        }
    }
}