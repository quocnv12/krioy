<?php

namespace App\Http\Controllers\Api\Parent;

use App\models\ChildrenProfiles;
use App\models\NoticeBoard;
use App\models\ParentProfiles;
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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


    public function update(Request $request, $id)
    {
        $rules = [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'birthday'          => 'required|before:today|after:01-01-2000',
            'gender'            => 'required',
            'date_of_joining'   => 'required',
            'unique_id'         => 'required|unique:children_profiles,unique_id,'.$id.'',
            'address'           => 'nullable',
            'allergies'         => 'nullable',
            'additional_note'   => 'nullable',
            'image'             => 'image|nullable',
            'status'            => 'nullable',
            'exist'             => 'nullable',

            'first_name_parent'   => 'required',
            'last_name_parent'    => 'required',
            'main_phone_parent'   => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:parent_profiles,main_phone,'.Auth::user()->id.'',
            'extra_phone_parent'  => 'nullable|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:parent_profiles,extra_phone,'.Auth::user()->id.'|different:main_phone_parent',
            'email_parent'        => 'required|email|unique:parent_profiles,email,'.Auth::user()->id.'',
            'gender_parent'       => 'nullable',
            'note_parent'         => 'nullable',
            'image_parent'        => 'image|nullable',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'first_name.required'           => 'First Name is required',
            'last_name.required'            => 'Last Name is required',
            'gender.required'               => 'Gender is required',
            'image.image'                   => 'Image is invalid',
            'birthday.required'             => 'Birthday is required',
            'date_of_joining.required'      => 'Date of Joining is required',
            'first_name_parent.required'    =>  'First Name is required',
            'last_name_parent.required'     =>  'Last Name is required',
            'main_phone_parent.required'        => 'Phone Number is required',
            'main_phone_parent.unique'        => 'Phone Number has been taken',
            'extra_phone_parent.unique'        => 'Phone Number has been taken',
            'main_phone_parent.size'        => 'Phone Number must have 10 digits',
            'extra_phone_parent.size'        => 'Phone Number must have 10 digits',
            'main_phone_parent.regex'        => 'Main Phone Number is invalid',
            'extra_phone_parent.regex'        => 'Extra Phone Number is invalid',
            'extra_phone_parent.different'        => 'This phone must different from main phone number',
            'email_parent.required'          => 'Email is required',
            'email_parent.email'          => 'Email is invalid',
            'email_parent.unique'         => 'This email has already been taken',
            'unique_id.unique'              => 'ID is exist',
            'unique_id.required'            => 'Unique ID is required',
            'image_parent.image'          => 'Image is invalid',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $children_profiles = ChildrenProfiles::find($id);
        $children_profiles->update($request->all());
        if ($request->hasFile('image')) {
            // xoa anh cu
            if ($children_profiles->image) {
                $old_image = $children_profiles->image;
                unlink($old_image);
            }
            $file = $request->image;
            $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/children/'), $filename);
            $children_profiles->image = 'images/children/' . $filename;
            $children_profiles->save();
        }
        $children_profiles->save();

        if ($request->programs_new != null) {
            //array chua cac id program ma children dang hoc
            $array_programs_old = [];
            $programs_old = explode(',', $request->programs_old);    //string to array
            foreach ($programs_old as $item) {
                array_push($array_programs_old, $item);
            }
            //array chua cac id program ma children moi dang ky
            $array_programs_new = [];
            $programs_new = explode(',', $request->programs_new);    //string to array
            foreach ($programs_new as $item) {
                array_push($array_programs_new, $item);
            }
            //so sanh array cu va moi
            $programs_add = array_diff($array_programs_new, $array_programs_old);
            $programs_remove = array_diff($array_programs_old, $array_programs_new);
            //them record children_programs
            foreach ($programs_add as $program_id) {
                $children_programs = new ChildrenProgram();
                $children_programs->id_children = $id;
                $children_programs->id_program = $program_id;
                $children_programs->save();
            }
            //xoa record children_programs
            foreach ($programs_remove as $program_id) {
                $children_programs = ChildrenProgram::where([['id_children', '=', $id], ['id_program', '=', $program_id]]);
                $children_programs->delete();
            }
        }else{
            //array chua cac id program ma children dang hoc
            $array_programs_old = [];
            $programs_old = explode(',', $request->programs_old);    //string to array
            foreach ($programs_old as $item) {
                array_push($array_programs_old, $item);
            }

            foreach ($array_programs_old as $program_id) {
                $children_programs = ChildrenProgram::where([['id_children', '=', $id], ['id_program', '=', $program_id]]);
                $children_programs->delete();
            }
        }

        // edit parent
        $parent_profiles = ParentProfiles::find(Auth::user()->id);
        $parent_profiles->first_name = $request->first_name_parent;
        $parent_profiles->last_name = $request->last_name_parent;
        $parent_profiles->main_phone = $request->main_phone_parent;
        $parent_profiles->extra_phone = $request->extra_phone_parent;
        $parent_profiles->email = $request->email_parent;
        $parent_profiles->note = $request->note_parent;
        $parent_profiles->gender = $request->gender_parent;

        if ($request->hasFile('image_parent')) {
            // xoa anh cu
            if ($parent_profiles->image) {
                $old_image = $parent_profiles->image;
                unlink($old_image);
            }
            $file = $request->image_parent;
            $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/parent/'), $filename);
            $parent_profiles->image = 'images/parent/' . $filename;
            $parent_profiles->save();
        }
        $parent_profiles->save();

        return response()->json([
            'children_profiles'=>$children_profiles,
            'parent_profiles'=>$parent_profiles
        ], 200);
    }


    public function show($id)
    {
        $parent_profiles = ParentProfiles::find(Auth::user()->id);
        $children_profiles = ChildrenProfiles::find($id);
        $programs = $children_profiles->chil_program;

        return response()->json([
            'children_profiles'=>$children_profiles,    //thong tin tre
            'parent_profiles'=>$parent_profiles,        //thong tin parent
            'programs'=>$programs                       //thong tin lop hoc
        ],200);
    }

    public function showProgramDetail($id)
    {
        $program = Programs::find($id);
        $children = $program->program_chil; //children trong program
        $staff = $program->program_staff;   //staff trong program

        return response()->json([
           'program'=>$program,
            'children'=>$children,
            'staff'=>$staff
        ],200);
    }

    public function showAllNoticeBoard($id) //$id = id cua children
    {
        $children = ChildrenProfiles::find($id);
        $programs = $children->chil_program;    //program ma children dang hoc
        $notice_board = []; // mang array chua notice cua program ma children dang hoc
        foreach ($programs as $item){
            array_push($notice_board,$item->program_notice);
        }

        return response()->json([
            'notice_board'=>$notice_board
        ], 200);
    }

    public function showOneNoticeBoard($id)
    {
        $notice_board = NoticeBoard::find($id);

        return response()->json([
            'notice_board'=>$notice_board
        ], 200);
    }
}
