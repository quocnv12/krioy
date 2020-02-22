<?php

namespace App\Http\Controllers\Api;

use App\models\ChildrenParent;
use App\models\ChildrenProfiles;
use App\models\ChildrenProgram;
use App\models\ParentProfiles;
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ChildrenProfilesController extends Controller
{

    public function index()
    {
        $programs = Programs::all();
        return response()->json([
            'programs'=>$programs
        ], 200);

    }


    public function create()
    {
        $programs = Programs::all();
        return response()->json([
            'programs'=>$programs
        ], 200);
    }

    public function store(Request $request)
    {
            $rules_no_parent = [
                'first_name' => 'required',
                'last_name' => 'required',
                'birthday' => 'required|before:today|after:01-01-2000',
                'gender' => 'required',
                'date_of_joining' => 'required',
                'unique_id' => 'required|unique:children_profiles,unique_id',
                'address' => 'nullable',
                'allergies' => 'nullable',
                'additional_note' => 'nullable',
                'image' => 'image|nullable',
                'status' => 'nullable',
                'exist' => 'nullable',

                'first_name_parent' => 'required',
                'last_name_parent' => 'required',
                'main_phone_parent' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:parent_profiles,main_phone',
                'extra_phone_parent' => 'nullable|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:parent_profiles,extra_phone|different:main_phone_parent',
                'email_parent' => 'required|email|unique:parent_profiles,email',
                'gender_parent' => 'nullable',
                'note_parent' => 'nullable',
                'image_parent' => 'image|nullable',
            ];

            $rules_yes_parent = [
                'first_name' => 'required',
                'last_name' => 'required',
                'birthday' => 'required|before:today|after:01-01-2000',
                'gender' => 'required',
                'date_of_joining' => 'required',
                'unique_id' => 'required|unique:children_profiles,unique_id',
                'address' => 'nullable',
                'allergies' => 'nullable',
                'additional_note' => 'nullable',
                'image' => 'image|nullable',
                'status' => 'nullable',
                'exist' => 'nullable',

                'first_name_parent' => 'required',
                'last_name_parent' => 'required',
                'main_phone_parent' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10',
                'extra_phone_parent' => 'nullable|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10',
                'email_parent' => 'required|email',
                'gender_parent' => 'nullable',
                'note_parent' => 'nullable',
                'image_parent' => 'image|nullable',
            ];

        if ($request->parent_exist == '0' || $request->parent_exist == null) {
            $validator = Validator::make($request->all(), $rules_no_parent,[
                'first_name.required' => 'First Name is required',
                'last_name.required' => 'Last Name is required',
                'gender.required' => 'Gender is required',
                'image.image' => 'Image is invalid',
                'birthday.required' => 'Birthday is required',
                'date_of_joining.required' => 'Date of Joining is required',
                'first_name_parent.required' => 'First Name is required',
                'last_name_parent.required' => 'Last Name is required',
                'main_phone_parent.required' => 'Phone Number is required',
                'main_phone_parent.unique' => 'Phone Number has been taken',
                'extra_phone_parent.unique' => 'Phone Number has been taken',
                'main_phone_parent.size' => 'Phone Number must have 10 digits',
                'extra_phone_parent.size' => 'Phone Number must have 10 digits',
                'main_phone_parent.regex' => 'Main Phone Number is invalid',
                'extra_phone_parent.regex' => 'Extra Phone Number is invalid',
                'extra_phone_parent.different' => 'This phone must different from Main phone',
                'email_parent.required' => 'Email is required',
                'email_parent.email' => 'Email is invalid',
                'email_parent.unique' => 'This email has already been taken',
                'unique_id.unique' => 'ID is exist',
                'unique_id.required' => 'Unique ID is required',
                'image_parent.image' => 'Image is invalid',
            ]);
        }else{
            $validator = Validator::make($request->all(), $rules_yes_parent,[
                'first_name.required' => 'First Name is required',
                'last_name.required' => 'Last Name is required',
                'gender.required' => 'Gender is required',
                'image.image' => 'Image is invalid',
                'birthday.required' => 'Birthday is required',
                'date_of_joining.required' => 'Date of Joining is required',
                'first_name_parent.required' => 'First Name is required',
                'last_name_parent.required' => 'Last Name is required',
                'main_phone_parent.required' => 'Phone Number is required',
                'main_phone_parent.size' => 'Phone Number must have 10 digits',
                'extra_phone_parent.size' => 'Phone Number must have 10 digits',
                'main_phone_parent.regex' => 'Main Phone Number is invalid',
                'extra_phone_parent.regex' => 'Extra Phone Number is invalid',
                'extra_phone_parent.different' => 'This phone must different from Main phone',
                'email_parent.required' => 'Email is required',
                'email_parent.email' => 'Email is invalid',
                'unique_id.unique' => 'ID is exist',
                'unique_id.required' => 'Unique ID is required',
                'image_parent.image' => 'Image is invalid',
            ]);
        }



        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        //neu khong trung parent
        if ($request->parent_exist == '0' || $request->parent_exist == null) {
            $parent_profiles = new ParentProfiles();
            $parent_profiles->first_name = $request->first_name_parent;
            $parent_profiles->last_name = $request->last_name_parent;
            $parent_profiles->main_phone = $request->main_phone_parent;
            $parent_profiles->extra_phone = $request->extra_phone_parent;
            $parent_profiles->email = $request->email_parent;
            $parent_profiles->note = $request->note_parent;
            $parent_profiles->gender = $request->gender_parent;
            $password = str_random(9);
            $parent_profiles->password = bcrypt($password);

            $parent_profiles->save();

            if ($request->hasFile('image_parent')) {
                $file = $request->image_parent;
                $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/parent/'), $filename);
                $parent_profiles->image = 'images/parent/' . $filename;
                $parent_profiles->save();
            }
        }
        else{           //neu trung phu huynh
            $parent_profiles = ParentProfiles::find($request->id_parent_exist);
            $parent_profiles->first_name = $request->first_name_parent;
            $parent_profiles->last_name = $request->last_name_parent;
            $parent_profiles->main_phone = $request->main_phone_parent;
            $parent_profiles->extra_phone = $request->extra_phone_parent;
            $parent_profiles->email = $request->email_parent;
            $parent_profiles->note = $request->note_parent;
            $parent_profiles->gender = $request->gender_parent;
            $password = str_random(9);
            $parent_profiles->password = bcrypt($password);

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
        }

        $children_profiles = ChildrenProfiles::create($request->all());
        //xu ly avatar
        if ($request->hasFile('image')) {
            $file = $request->image;
            $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/children/'), $filename);
            $children_profiles->image = 'images/children/' . $filename;
        }
        $children_profiles->save();

        //lay id cua children vua tao moi xong
        $children_id = $children_profiles->id;

        if ($request->programs) {
            //string to array
            $programs = explode(',', $request->programs);   //turn string into array
            //luu vao bang children_programs
            foreach ($programs as $program) {
                $children_program = new ChildrenProgram();
                $children_program->id_children = $children_id;
                $children_program->id_program = $program;
                $children_program->save();
            }
            $children_program->save();
        }

        //id parent vua tao moi xong
        $parent_id = $parent_profiles->id;
        //tao record ben bang children_parent
        $children_parent = new ChildrenParent();
        $children_parent->id_children = $children_id;
        $children_parent->id_parent = $parent_id;
        $children_parent->save();

        //gửi mail thông báo  tới parent
        $email=$parent_profiles->email;

        //$url = route('link.reset.password',['email'=>$email]);
        $data=[
            // 'route' => $url,
            'first_name' => $parent_profiles->first_name,
            'last_name'  => $parent_profiles->last_name,
            'password' =>$password,
            'email' => $email,
            'phone' => $parent_profiles->main_phone,
            //  'address' => $parent_profiles->address,
        ] ;

        Mail::send('pages.children.email', $data, function($message) use ($email){
            $message->to($email, 'Welcome to Kids-now')->subject('Welcome to Kids-now !');
        });

        return response()->json([
           'children_profiles'=>$children_profiles
        ], 201);
    }


    public function show($id)
    {
        $programs = Programs::all();
        if (! $programs){
            return response()->json(['message'=>['message'=>'Something wrong']], 404);
        }else {
            if ($id == 0) {
                $children_profiles = DB::table('children_profiles')
                    ->leftJoin('children_programs', 'children_profiles.id', '=', 'children_programs.id_children')
                    ->select(['children_profiles.*'])
                    ->where('children_programs.id_program', '=', null)
                    ->simplePaginate(18);
            } else {
                $children_profiles = DB::table('programs')
                    ->join('children_programs', 'programs.id', '=', 'children_programs.id_program')
                    ->join('children_profiles', 'children_profiles.id', '=', 'children_programs.id_children')
                    ->select(['children_profiles.*'])
                    ->where('children_programs.id_program', '=', $id)
                    ->simplePaginate(18);
            }

            return response()->json([
                'programs'=>$programs,
                'children_profiles'=>$children_profiles
            ], 200);
        }
    }

    public function view($id){
        $children_profiles = ChildrenProfiles::find($id);

        if (!$children_profiles){
            return response()->json(['message'=>'Something wrong'], 404);
        }else {
            $programs = Programs::all();
            $programs_choose = DB::table('programs')
                ->join('children_programs', 'programs.id', '=', 'children_programs.id_program')
                ->select('id')
                ->where('id_children', '=', $id)
                ->get();
            // array chua cac id program ma children dang hoc
            $array_programs_choose = [];
            foreach ($programs_choose as $key => $value) {
                array_push($array_programs_choose, $value->id);
            }
            $parent_profiles = DB::table('parent_profiles')
                ->join('children_parent', 'parent_profiles.id', '=', 'children_parent.id_parent')
                ->select('*')
                ->where('id_children', '=', $id)
                ->first();

            return response()->json([
                'children_profiles' => $children_profiles,
                'programs' => $programs,
                'array_programs_choose' => $array_programs_choose,
                'parent_profiles' => $parent_profiles
            ]);
        }
    }

    public function edit($id)
    {
        $children_profiles = ChildrenProfiles::find($id);

        if (!$children_profiles){
            return response()->json(['message'=>'Something wrong'], 404);
        }else {
            $programs = Programs::all();
            $programs_choose = DB::table('programs')
                ->join('children_programs', 'programs.id', '=', 'children_programs.id_program')
                ->select('id')
                ->where('id_children', '=', $id)
                ->get();
            // array chua cac id program ma children dang hoc
            $array_programs_choose = [];
            foreach ($programs_choose as $key => $value) {
                array_push($array_programs_choose, $value->id);
            }
            $parent_profiles = DB::table('parent_profiles')
                ->join('children_parent', 'parent_profiles.id', '=', 'children_parent.id_parent')
                ->select('*')
                ->where('id_children', '=', $id)
                ->first();

            return response()->json([
                'children_profiles' => $children_profiles,
                'programs' => $programs,
                'array_programs_choose' => $array_programs_choose,
                'parent_profiles' => $parent_profiles
            ]);
        }
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
            'main_phone_parent'   => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:parent_profiles,main_phone,'.$request->id_parent_profiles.'',
            'extra_phone_parent'  => 'nullable|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:parent_profiles,extra_phone,'.$request->id_parent_profiles.'|different:main_phone_parent',
            'email_parent'        => 'required|email|unique:parent_profiles,email,'.$request->id_parent_profiles.'',
            'gender_parent'       => 'nullable',
            'note_parent'         => 'nullable',
            'image_parent'        => 'image|nullable',
        ];

        $validator = Validator::make($request->all(), $rules,[
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

        $children_profiles = ChildrenProfiles::findOrFail($id);
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

        if ($request->programs_new) {
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
        }

        // edit parent
        $parent_profiles = ParentProfiles::find($request->id_parent_profiles);
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
            'children_profiles'=>$children_profiles
        ], 200);
    }

    public function destroy($id)
    {
        $children_profiles = ChildrenProfiles::findOrFail($id);

        if (! $children_profiles){
            return response()->json(['message'=>'Something wrong'], 404);
        }else {
            if (isset($children_profiles->image)) {
                $old_image = $children_profiles->image;
                unlink($old_image);
            }

            $children_parent = ChildrenParent::where('id_children', '=', $id)->get();
            if (isset($children_parent)) {
                foreach ($children_parent as $child_parent) {
                    //xoa parent cua children bi xoa
                    $parent = ParentProfiles::where('id', '=', $child_parent->id_parent)->get();
                    if ($parent->image) {
                        $old_image = $parent->image;
                        unlink($old_image);
                        // ko xoa parent. lay thong tin sau nay dem ban data lay tien
                    }

                    DB::table('children_parent')->where('id_children', '=', $child_parent)->delete();
                }
            }

            $children_profiles->delete();

            $programs = Programs::all();
            return response()->json([
                'programs' => $programs
            ], 204);
        }
    }

    public function searchByName(Request $request)
    {
        $children_profiles = ChildrenProfiles::where(DB::raw("concat(first_name ,' ', last_name)"), 'like', '%' . $request->get('q') . '%')->get();

        if (!$children_profiles){
            return response()->json(['message'=>'Not found'], 404);
        }else {
            return response()->json([
                'children_profiles' => $children_profiles
            ], 200);
        }
    }
}
