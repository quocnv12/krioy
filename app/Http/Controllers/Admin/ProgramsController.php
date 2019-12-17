<?php

namespace App\Http\Controllers\Admin;

use App\models\ChildrenProgram;
use App\models\Programs;
use App\models\StaffProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programs = DB::table('programs')
            ->join('children_programs','programs.id','=','children_programs.id_program')
            ->groupBy('programs.program_name')
            ->get();

        foreach($programs as $key => $program)
        {
            $programs[$key]->schedule = explode(',',$programs[$key]->schedule); //turn string to array to show
            $programs[$key]->id_children = DB::table('programs')
                ->join('children_programs','programs.id','=','children_programs.id_program')
                ->join('children_profiles','children_profiles.id','=','children_programs.id_children')
                ->select(['children_profiles.*'])
                ->where('children_programs.id_program','=',$program->id)
                ->get();

            $programs[$key]->id_staff = DB::table('programs')
                ->join('staff_programs','programs.id','=','staff_programs.id_program')
                ->join('staff_profiles','staff_profiles.id','=','staff_programs.id_staff')
                ->select(['staff_profiles.*'])
                ->where('staff_programs.id_program','=',$program->id)
                ->get();

        }

        return response()->json(['programs'=>$programs],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $programs = Programs::create($request->all());
        $programs->save();


        //solve schedule
        $all_schedule = $request->schedule;
        $arr = [];
        foreach ((array)$all_schedule as $schedule)
        {
            array_push($arr, $schedule);
        }
        $arr_all_schedule = implode(",",$arr);  //turn array to string to save in database
        $programs->schedule = $arr_all_schedule;


        //add children and staff
        if ($request->staff){
            return $this->select_staff($request, $programs->id);
        }

        if ($request->children){
            return $this->select_children($request, $programs->id);
        }

        $programs->save();

        return response()->json(['programs'=>$programs],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Programs::find($id);
        $program->schedule = explode(',',$program->schedule); //turn string to array to show

        $children = DB::table('programs')
            ->join('children_programs','programs.id','=','children_programs.id_program')
            ->join('children_profiles','children_profiles.id','=','children_programs.id_children')
            ->select(['children_profiles.*'])
            ->where('children_programs.id_program','=',$id)
            ->get();

        $staff = DB::table('programs')
            ->join('staff_programs','programs.id','=','staff_programs.id_program')
            ->join('staff_profiles','staff_profiles.id','=','staff_programs.id_staff')
            ->select(['staff_profiles.*'])
            ->where('staff_programs.id_program','=',$program->id)
            ->get();

        return response()->json(['programs'=>$program, 'children'=>$children, 'staff'=>$staff],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


}
