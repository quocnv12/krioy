<?php

namespace App\Http\Controllers\Admin;

use App\models\ChildrenProfiles;
use App\models\ChildrenProgram;
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChildrenProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programs = Programs::all();

        //return response()->json(['children_profiles'=>$children_profiles],200);
        return view('pages.children.child_profile',['programs'=>$programs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Programs::all();
        return view('pages.children.create_child',['programs'=>$programs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $children_profiles = ChildrenProfiles::create($request->all());
        $children_profiles->save();

        //lay id cua children vua tao moi xong
        $children_id = $children_profiles->id;

        //string to array
        $programs = explode(',',$request->programs);

        foreach ($programs as $program){
            $children_program = new ChildrenProgram();
            $children_program->id_children = $children_id;
            $children_program->id_program = $program;
            $children_program->save();
        }
        $children_program->save();



        //return response()->json(['children_profiles' => $children_profiles], 201);
        return redirect()->back()->with('notify','Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //
        $programs = Programs::all();
       $children_profiles = DB::table('programs')
            ->join('children_programs','programs.id','=','children_programs.id_program')
            ->join('children_profiles','children_profiles.id','=','children_programs.id_children')
            ->select(['children_profiles.*'])
            ->where('children_programs.id_program','=',$id)
            ->get();

        //return response()->json(['children_profiles' => $children_profiles]);
        return view('pages.children.child_profile',['children_profiles'=>$children_profiles, 'programs'=>$programs]);
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
        $children_profiles = ChildrenProfiles::findOrFail($id);
        return view('pages.children.edit_child',['children_profiles'=>$children_profiles]);

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
        //
        $children_profiles = ChildrenProfiles::findOrFail($id);
        $children_profiles->update($request->all());

        $children_profiles->save();

        return response()->json(['children_profiles' => $children_profiles], 200);

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
        $children_profiles = ChildrenProfiles::findOrFail($id);
        $children_profiles->delete();

        return response()->json(null, 204);
    }
}
