<?php

namespace App\Http\Controllers\Admin;

use App\models\ChildrenProfiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $children_profiles = ChildrenProfiles::all();

        return response()->json(['children_profiles'=>$children_profiles],200);
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
        //
        $children_profiles = ChildrenProfiles::create($request->all());

        $children_profiles->save();

        return response()->json(['children_profiles' => $children_profiles], 201);
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
        $children_profiles = ChildrenProfiles::find($id);

        return response()->json(['children_profiles' => $children_profiles]);

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
