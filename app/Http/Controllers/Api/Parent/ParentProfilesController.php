<?php

namespace App\Http\Controllers\Api\Parent;

use App\models\ChildrenProfiles;
use App\models\ParentProfiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParentProfilesController extends Controller
{

    public function index()
    {
        $parent_profiles = ParentProfiles::find(Auth::user()->id);
        $children_profiles = $parent_profiles->children_parent;
        return response()->json([
            'children_profiles'=>$children_profiles,
            'parent_profiles'=>$parent_profiles
            ],200);
    }

    public function store(Request $request)
    {
        $rules_no_parent = [

        ];
    }


    public function show($id)
    {
        $parent_profiles = ParentProfiles::find(Auth::user()->id);
        $children_profiles = ChildrenProfiles::find($id);
        return response()->json([
            'children_profiles'=>$children_profiles,
            'parent_profiles'=>$parent_profiles
        ],200);
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
