<?php
namespace App\Http\Controllers\Admin;



use App\models\ChildrenProfiles;

use App\models\ChildrenProgram;
use App\models\Programs;
use App\models\StaffProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ProgramsController extends Controller
{
    public function index()
    {
//        $programs = DB::table('programs')
//            ->join('children_programs','programs.id','=','children_programs.id_program')
//            ->groupBy('programs.program_name')
//            ->get();
//
//        foreach($programs as $key => $program)
//        {
//            $programs[$key]->schedule = explode(',',$programs[$key]->schedule); //turn string to array to show
//            $programs[$key]->id_children = DB::table('programs')
//                ->join('children_programs','programs.id','=','children_programs.id_program')
//                ->join('children_profiles','children_profiles.id','=','children_programs.id_children')
//                ->select(['children_profiles.*'])
//                ->where('children_programs.id_program','=',$program->id)
//                ->get();
//
//            $programs[$key]->id_staff = DB::table('programs')
//                ->join('staff_programs','programs.id','=','staff_programs.id_program')
//                ->join('staff_profiles','staff_profiles.id','=','staff_programs.id_staff')
//                ->select(['staff_profiles.*'])
//                ->where('staff_programs.id_program','=',$program->id)
//                ->get();
//
//        }

//        return response()->json(['programs'=>$programs],200);

        $programs = DB::table('programs')
            ->leftJoin('children_programs', 'programs.id', '=', 'children_programs.id_program')
            ->select(['programs.program_name', 'programs.id'])
            ->selectRaw('count(children_programs.id_children) AS total_children')
            ->groupBy(['programs.program_name', 'programs.id'])
            ->get();

        return view('pages.program.program', ['programs' => $programs]);
    }

    public function create()
    {
        return view('pages.program.add_program');
    }

    public function selectChild(){
        $children_profiles = ChildrenProfiles::orderBy('last_name')->paginate(10);
        return view('pages.program.select_child',['children_profiles'=>$children_profiles]);
    }

    public function selectStaff(){
        return view('pages.program.select_staff');
    }

    public function store(Request $request)
    {
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
        //add children and staff
        if ($request->staff) {
            return $this->select_staff($request, $programs->id);
        }
        $programs->save();
        return response()->json(['programs' => $programs], 201);


        //return response()->json(['programs'=>$programs],201);
        return redirect()->back()->with('notify', 'Added Successfully');

    }

    public function show($id)
    {
//        $program = Programs::find($id);
//        $program->schedule = explode(',',$program->schedule); //turn string to array to show
//
//        $children = DB::table('programs')
//            ->join('children_programs','programs.id','=','children_programs.id_program')
//            ->join('children_profiles','children_profiles.id','=','children_programs.id_children')
//            ->select(['children_profiles.*'])
//            ->where('children_programs.id_program','=',$id)
//            ->get();
//
//        $staff = DB::table('programs')
//            ->join('staff_programs','programs.id','=','staff_programs.id_program')
//            ->join('staff_profiles','staff_profiles.id','=','staff_programs.id_staff')
//            ->select(['staff_profiles.*'])
//            ->where('staff_programs.id_program','=',$program->id)
//            ->get();
//
//        return response()->json(['programs'=>$program, 'children'=>$children, 'staff'=>$staff],200);

        $program = Programs::find($id);
        $array_schedule = explode(',',$program->schedule);  //string to array

        $children_profiles = DB::table('children_profiles')
            ->join('children_programs','children_profiles.id','=','children_programs.id_children')
            ->select(['*'])
            ->where('children_programs.id_program','=',$id)
            ->get();

        $staff_profiles = DB::table('staff_profiles')
            ->join('staff_programs','staff_profiles.id','=','staff_programs.id_staff')
            ->select(['*'])
            ->where('staff_programs.id_program','=',$id)
            ->get();
        return view('pages.program.view_program',['program'=>$program,
                                                        'array_schedule'=>$array_schedule,
                                                        'children_profiles'=>$children_profiles,
                                                        'staff_profiles'=>$staff_profiles]);
    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $programs = Programs::findOrFail($id);
        $programs->update($request->all());
        if ($request->schedule){
            $all_schedule = $request->schedule;
            $arr = [];
            foreach ($all_schedule as $schedule)
            {
                array_push($arr, $schedule);
            }
            $arr_all_schedule = implode(',',$arr);  //turn array to string to save in database
            $programs->schedule = $arr_all_schedule;
            $programs->save();
        }
        return response()->json(['programs' => $programs], 200);
    }

    public function destroy($id)
    {
        //
        $programs = Programs::findOrFail($id);
        $programs->delete();
        return response()->json(null, 204);
    }

    public function select_staff(Request $request, $id)
    {
        $id_program = $id;
        $all_staff = $request->staff;
        foreach (array($all_staff) as $staff){
            $staff_programs = new StaffProgram();
            $staff_programs->id_staff = $staff->id;
            $staff_programs->id_program = $id_program;
            $staff_programs->save();
        }
    }

//    public function select_staff(Request $request, $id)
//    {
//        $id_program = $id;
//        $all_staff = $request->staff;
//        foreach (array($all_staff) as $staff){
//            $staff_programs = new StaffProgram();
//            $staff_programs->id_staff = $staff->id;
//            $staff_programs->id_program = $id_program;
//            $staff_programs->save();
//        }
//    }

}

