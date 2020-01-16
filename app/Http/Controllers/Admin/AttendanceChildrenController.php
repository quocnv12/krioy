<?php

namespace App\Http\Controllers\Admin;

use App\models\ChildrenProfiles;
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AttendanceChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $programs = DB::table('programs')
        //     ->join('children_programs','programs.id','=','children_programs.id_program')
        //     ->groupBy('programs.program_name')
        //     ->get();

        // foreach($programs as $key => $program)
        // {
        //     $programs[$key]->id_children = DB::table('programs')
        //         ->join('children_programs','programs.id','=','children_programs.id_program')
        //         ->join('children_profiles','children_profiles.id','=','children_programs.id_children')
        //         ->select(['children_profiles.*'])
        //         ->where('children_programs.id_program','=',$program->id)
        //         ->get();
        // }

        // return response()->json(['programs' => $programs],200);

        $data['programs']  = Programs::all();
        return view('pages.attendance.attendance',$data);


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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $program = Programs::find($id);
        // $children_profiles = DB::table('programs')
        //                     ->join('children_programs','programs.id','=','children_programs.id_program')
        //                     ->join('children_profiles','children_profiles.id','=','children_programs.id_children')
        //                     ->select(['children_profiles.*'])
        //                     ->where('children_programs.id_program','=',$id)
        //                     ->get();
        // return response()->json(['programs'=>$program, 'children_profiles'=>$children_profiles],201);

        $data['programs'] = Programs::all();
        $data['children_profiles'] = DB::table('programs')
        
            ->join('children_programs', 'programs.id', '=', 'children_programs.id_program')
            ->join('children_profiles', 'children_profiles.id', '=', 'children_programs.id_children')
            ->select(['children_profiles.*'])
            ->where('children_programs.id_program', '=', $id)
            ->get();
       
        return view('pages.attendance.attendance',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
