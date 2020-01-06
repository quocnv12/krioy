<?php
namespace App\Http\Controllers\Admin;
use App\models\ChildrenParent;
use App\models\ChildrenProfiles;
use App\models\ChildrenProgram;
use App\models\ParentProfiles;
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ChildrenProfilesController extends Controller
{
    public function index()
    {
        //
        $programs = Programs::all();
        $children_all = ChildrenProfiles::all();
        //return response()->json(['children_profiles'=>$children_profiles],200);
        return view('pages.children.child_profile', ['programs' => $programs, 'children_all' => $children_all]);
    }

    public function create()
    {
        $programs = Programs::all();
        return view('pages.children.create_child', ['programs' => $programs]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'birthday' => 'required',
                'gender' => 'required',
                'unique_id' => 'required|unique:children_profiles,unique_id',
                'address' => 'nullable',
                'allergies' => 'nullable',
                'additional_note' => 'nullable',
                'image' => 'image|nullable',
                'status' => 'nullable',
                'exist' => 'nullable',
                'first_name_parent' => 'nullable',
                'last_name_parent' => 'nullable',
                'phone_parent' => 'numeric|nullable',
                'email_parent' => 'email|nullable',
                'gender_parent' => 'nullable',
                'note_parent' => 'nullable',
                'relationship' => 'nullable'
            ],
            [
                'first_name.required' => 'Please input first name',
                'last_name.required' => 'Please input last name',
                'gender.required' => 'Please choose gender',
                'image.image' => 'Image is invalid',
                'birthday.required' => 'Please input birthday',
                'phone_parent.numeric' => 'Number is invalid',
                'phone_parent.required' => 'Please input phone number',
                'email_parent.email' => 'Email is invalid',
                'relationship.required' => 'Please choose relationship',
                'unique_id.unique' => 'ID is exist',
                'unique_id.required' => 'Please input unique ID',
                'first_name_parent.required' => 'Please input first name',
                'last_name_parent.required' => 'Please input last name',
                'email_parent.required' => 'Please input email',
                'gender_parent.required' => 'Please choose gender',
                'phone_parent' => 'Please input phone'
            ]);
        $children_profiles = ChildrenProfiles::create($request->all());
        if ($request->hasFile('image')) {
            $file = $request->image;
            $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
            $file->move('images/children/', $filename);
            $children_profiles->image = 'images/children/' . $filename;
        }
        $children_profiles->save();
        if ($request->programs) {
            //lay id cua children vua tao moi xong
            $children_id = $children_profiles->id;
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
        if ($request->first_name_parent) {
            //tao record ben bang parent_profiles
            $parent = new ParentProfiles();
            $parent->first_name = $request->first_name_parent;
            $parent->last_name = $request->last_name_parent;
            $parent->phone = $request->phone_parent;
            $parent->email = $request->email_parent;
            $parent->note = $request->note_parent;
            $parent->gender = $request->gender_parent;
            $parent->save();
            //id parent vua tao moi xong
            $parent_id = $parent->id;
            //tao record ben bang children_parent
            $children_parent = new ChildrenParent();
            $children_parent->id_children = $children_id;
            $children_parent->id_parent = $parent_id;
            $children_parent->relationship = $request->relationship;
            $children_parent->save();
        }
        //return response()->json(['children_profiles' => $children_profiles], 201);
        return redirect()->back()->with('notify', 'Added Successfully');
    }

    public function show($id)
    {
        //
        $programs = Programs::all();
        $children_profiles = DB::table('programs')
            ->join('children_programs', 'programs.id', '=', 'children_programs.id_program')
            ->join('children_profiles', 'children_profiles.id', '=', 'children_programs.id_children')
            ->select(['children_profiles.*'])
            ->where('children_programs.id_program', '=', $id)
            ->get();
        //return response()->json(['children_profiles' => $children_profiles]);
        return view('pages.children.child_profile', ['children_profiles' => $children_profiles, 'programs' => $programs]);
    }

    public function edit($id)
    {
        //
        $children_profiles = ChildrenProfiles::find($id);
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
            ->get();
        return view('pages.children.edit_child', ['children_profiles' => $children_profiles, 'programs' => $programs, 'array_programs_choose' => $array_programs_choose, 'parent_profiles' => $parent_profiles]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'birthday' => 'required',
                'gender' => 'required',
                'unique_id' => 'required|unique:children_profiles,unique_id,' . $id . '',
                'address' => 'nullable',
                'allergies' => 'nullable',
                'additional_note' => 'nullable',
                'image' => 'image|nullable',
                'status' => 'nullable',
                'exist' => 'nullable',
                'first_name_parent' => 'nullable',
                'last_name_parent' => 'nullable',
                'phone_parent' => 'numeric|nullable',
                'email_parent' => 'email|nullable',
                'gender_parent' => 'nullable',
                'note_parent' => 'nullable',
                'relationship' => 'nullable'
            ],
            [
                'first_name.required' => 'Please input first name',
                'last_name.required' => 'Please input last name',
                'gender.required' => 'Please choose gender',
                'image.image' => 'Image is invalid',
                'birthday.required' => 'Please input birthday',
                'phone_parent.numeric' => 'Number is invalid',
                'phone_parent.required' => 'Please input phone number',
                'email_parent.email' => 'Email is invalid',
                'relationship.required' => 'Please choose relationship',
                'unique_id.unique' => 'ID is exist',
                'unique_id.required' => 'Please input unique ID',
                'first_name_parent.required' => 'Please input first name',
                'last_name_parent.required' => 'Please input last name',
                'email_parent.required' => 'Please input email',
                'gender_parent.required' => 'Please choose gender',
                'phone_parent' => 'Please input phone'
            ]);
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
            $file->move('images/children/', $filename);
            $children_profiles->image = 'images/children/' . $filename;
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
        //return response()->json(['children_profiles' => $children_profiles], 200);
        return redirect()->back()->with('notify', 'Updated Successfully');
    }

    public function destroy($id)
    {
        //
        $children_profiles = ChildrenProfiles::findOrFail($id);
        $children_profiles->delete();
        $children_program = ChildrenProgram::where('id_children', '=', $id)->get();
        foreach ($children_program as $children) {
            $children->delete();
        }
        $children_parent = ChildrenParent::where('id_children', '=', $id)->get();
        foreach ($children_parent as $children) {
            //xoa parent cua children bi xoa
            $parent = ParentProfiles::where('id', '=', $children->id_parent)->get();
            foreach ($parent as $person) {
                $person->delete();      //xoa parent
            }
            $children->delete();        //xoa children
        }
        //return response()->json(null, 204);
        return view('pages.children.child_profile')->with('notify', 'Deleted Successfully');
    }


    public function searchByTypeahead(Request $request)
    {
        $children_profiles = ChildrenProfiles::where('first_name', 'like', '%' . $request->get('q') . '%')
            ->orWhere('last_name', 'like', '%' . $request->get('q') . '%')
            ->orderBy('last_name')
            ->get();

        return response()->json($children_profiles);
    }

}
