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
        $programs = Programs::all();
        return view('pages.children.child_profile', ['programs' => $programs]);
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
                'first_name'        => 'required',
                'last_name'         => 'required',
                'birthday'          => 'required',
                'gender'            => 'required',
                'unique_id'         => 'required|unique:children_profiles,unique_id',
                'address'           => 'nullable',
                'allergies'         => 'nullable',
                'additional_note'   => 'nullable',
                'image'             => 'image|nullable',
                'status'            => 'nullable',
                'exist'             => 'nullable',

                'first_name_parent_1'   => 'nullable',
                'last_name_parent_1'    => 'nullable',
                'phone_parent_1'        => 'numeric|nullable',
                'email_parent_1'        => 'email|nullable',
                'gender_parent_1'       => 'nullable',
                'note_parent_1'         => 'nullable',
                'relationship_1'        => 'nullable',
                'image_parent_1'        => 'image|nullable',

                'first_name_parent_2'   => 'nullable',
                'last_name_parent_2'    => 'nullable',
                'phone_parent_2'        => 'numeric|nullable',
                'email_parent_2'        => 'email|nullable',
                'gender_parent_2'       => 'nullable',
                'note_parent_2'         => 'nullable',
                'relationship_2'        => 'nullable',
                'image_parent_2'        => 'image|nullable',
            ],
            [
                'first_name.required'       => 'Please input first name',
                'last_name.required'        => 'Please input last name',
                'gender.required'           => 'Please choose gender',
                'image.image'               => 'Image is invalid',
                'birthday.required'         => 'Please input birthday',
                'phone_parent_1.numeric'    => 'Number is invalid',
                'phone_parent_2.numeric'    => 'Number is invalid',
                'email_parent_1.email'      => 'Email is invalid',
                'email_parent_2.email'      => 'Email is invalid',
                'unique_id.unique'          => 'ID is exist',
                'unique_id.required'        => 'Please input unique ID',
                'image_parent_1.image'      => 'Image is invalid',
                'image_parent_2.image'      => 'Image is invalid',
            ]);
        $children_profiles = ChildrenProfiles::create($request->all());
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

        //parent 1
        if ($request->first_name_parent_1 && $request->last_name_parent_1) {
            //tao record ben bang parent_profiles
            $parent_1 = new ParentProfiles();
            $parent_1->first_name = $request->first_name_parent_1;
            $parent_1->last_name = $request->last_name_parent_1;
            $parent_1->phone = $request->phone_parent_1;
            $parent_1->email = $request->email_parent_1;
            $parent_1->note = $request->note_parent_1;
            $parent_1->gender = $request->gender_parent_1;
            $parent_1->save();

            if ($request->hasFile('image_parent_1')) {
                $file = $request->image_parent_1;
                $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/parent/'), $filename);
                $parent_1->image = 'images/parent/' . $filename;
                $parent_1->save();
            }

            //id parent vua tao moi xong
            $parent_1_id = $parent_1->id;
            //tao record ben bang children_parent
            $children_parent = new ChildrenParent();
            $children_parent->id_children = $children_id;
            $children_parent->id_parent = $parent_1_id;
            $children_parent->relationship = $request->relationship_1;
            $children_parent->save();
        }

        //parent_2
        if ($request->first_name_parent_2 && $request->last_name_parent_2) {
            //tao record ben bang parent_profiles
            $parent_2 = new ParentProfiles();
            $parent_2->first_name = $request->first_name_parent_2;
            $parent_2->last_name = $request->last_name_parent_2;
            $parent_2->phone = $request->phone_parent_2;
            $parent_2->email = $request->email_parent_2;
            $parent_2->note = $request->note_parent_2;
            $parent_2->gender = $request->gender_parent_2;
            $parent_2->save();

            if ($request->hasFile('image_parent_2')) {
                $file = $request->image_parent_2;
                $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/parent/'), $filename);
                $parent_2->image = 'images/parent/' . $filename;
                $parent_2->save();
            }

            //id parent vua tao moi xong
            $parent_2_id = $parent_2->id;
            //tao record ben bang children_parent
            $children_parent = new ChildrenParent();
            $children_parent->id_children = $children_id;
            $children_parent->id_parent = $parent_2_id;
            $children_parent->relationship = $request->relationship_2;
            $children_parent->save();
        }

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
        $parent_profiles_all = DB::table('parent_profiles')
            ->join('children_parent', 'parent_profiles.id', '=', 'children_parent.id_parent')
            ->select('*')
            ->where('id_children', '=', $id)
            ->get();

        if (count($parent_profiles_all) > 1){
            $parent_profiles_1 = $parent_profiles_all[0];
            $parent_profiles_2 = $parent_profiles_all[1];

            return view('pages.children.edit_child', ['children_profiles' => $children_profiles,
                'programs' => $programs,
                'array_programs_choose' => $array_programs_choose,
                'parent_profiles_1' => $parent_profiles_1,
                'parent_profiles_2' => $parent_profiles_2,
            ]);
        }else{
            $parent_profiles_1 = $parent_profiles_all[0];
            return view('pages.children.edit_child', ['children_profiles' => $children_profiles,
                'programs' => $programs,
                'array_programs_choose' => $array_programs_choose,
                'parent_profiles_1' => $parent_profiles_1,
            ]);
        }


    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'first_name'        => 'required',
                'last_name'         => 'required',
                'birthday'          => 'required',
                'gender'            => 'required',
                'unique_id'         => 'required|unique:children_profiles,unique_id,' . $id . '',
                'address'           => 'nullable',
                'allergies'         => 'nullable',
                'additional_note'   => 'nullable',
                'image'             => 'image|nullable',
                'status'            => 'nullable',
                'exist'             => 'nullable',

                'first_name_parent_1'   => 'nullable',
                'last_name_parent_1'    => 'nullable',
                'phone_parent_1'        => 'numeric|nullable',
                'email_parent_1'        => 'email|nullable',
                'gender_parent_1'       => 'nullable',
                'note_parent_1'         => 'nullable',
                'relationship_1'        => 'nullable',
                'image_parent_1'        => 'image|nullable',

                'first_name_parent_2'   => 'nullable',
                'last_name_parent_2'    => 'nullable',
                'phone_parent_2'        => 'numeric|nullable',
                'email_parent_2'        => 'email|nullable',
                'gender_parent_2'       => 'nullable',
                'note_parent_2'         => 'nullable',
                'relationship_2'        => 'nullable',
                'image_parent_2'        => 'image|nullable',
            ],
            [
                'first_name.required'           => 'Please input first name',
                'last_name.required'            => 'Please input last name',
                'gender.required'               => 'Please choose gender',
                'image.image'                   => 'Image is invalid',
                'birthday.required'             => 'Please input birthday',
                'phone_parent_1.numeric'        => 'Number is invalid',
                'phone_parent_2.numeric'        => 'Number is invalid',
                'email_parent_1.email'          => 'Email is invalid',
                'email_parent_2.email'          => 'Email is invalid',
                'unique_id.unique'              => 'ID is exist',
                'unique_id.required'            => 'Please input unique ID',
                'image_parent_1.image'      => 'Image is invalid',
                'image_parent_2.image'      => 'Image is invalid',
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
            $file->move(public_path('images/children/'), $filename);
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

        // edit parent
        $parent_profiles_all = DB::table('parent_profiles')
            ->join('children_parent', 'parent_profiles.id', '=', 'children_parent.id_parent')
            ->select('*')
            ->where('id_children', '=', $id)
            ->get();

        // co 1 parent
        if (count($parent_profiles_all) < 2) {
            $parent_1 = ParentProfiles::find($request->id_parent_profiles_1);
            $parent_1->first_name = $request->first_name_parent_1;
            $parent_1->last_name = $request->last_name_parent_1;
            $parent_1->phone = $request->phone_parent_1;
            $parent_1->email = $request->email_parent_1;
            $parent_1->note = $request->note_parent_1;
            $parent_1->gender = $request->gender_parent_1;
            $parent_1->save();

            if ($request->hasFile('image_parent_1')) {
                // xoa anh cu
                if ($parent_1->image) {
                    $old_image = $parent_1->image;
                    unlink($old_image);
                }
                $file = $request->image_parent_1;
                $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/parent/'), $filename);
                $parent_1->image = 'images/parent/' . $filename;
                $parent_1->save();
            }


            //sua record ben bang children_parent
            DB::table('children_parent')->where([['id_parent','=',$request->id_parent_profiles_1],['id_children','=',$id]])->update(['relationship'=>$request->relationship_1]);

            if ($request->first_name_parent_2 != null && $request->last_name_parent_2 != null) {
                $parent_2 = new ParentProfiles();
                $parent_2->first_name = $request->first_name_parent_2;
                $parent_2->last_name = $request->last_name_parent_2;
                $parent_2->phone = $request->phone_parent_2;
                $parent_2->email = $request->email_parent_2;
                $parent_2->note = $request->note_parent_2;
                $parent_2->gender = $request->gender_parent_2;
                $parent_2->save();

                if ($request->hasFile('image_parent_2')) {
                    $file = $request->image_parent_2;
                    $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/parent/'), $filename);
                    $parent_2->image = 'images/parent/' . $filename;
                    $parent_2->save();
                }

                //them record ben bang children_parent
                $parent_2_id = $parent_2->id;
                $children_parent_2 = new ChildrenParent();
                $children_parent_2->relationship = $request->relationship_2;
                $children_parent_2->id_children = $id;
                $children_parent_2->id_parent = $parent_2_id;
                $children_parent_2->save();

            }
        }else{  //co 2 parent
            $parent_1 = ParentProfiles::find($request->id_parent_profiles_1);
            $parent_1->first_name = $request->first_name_parent_1;
            $parent_1->last_name = $request->last_name_parent_1;
            $parent_1->phone = $request->phone_parent_1;
            $parent_1->email = $request->email_parent_1;
            $parent_1->note = $request->note_parent_1;
            $parent_1->gender = $request->gender_parent_1;
            $parent_1->save();

            if ($request->hasFile('image_parent_1')) {
                // xoa anh cu
                if ($parent_1->image) {
                    $old_image = $parent_1->image;
                    unlink($old_image);
                }
                $file = $request->image_parent_1;
                $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/parent/'), $filename);
                $parent_1->image = 'images/parent/' . $filename;
                $parent_1->save();
            }

            DB::table('children_parent')->where([['id_parent','=',$request->id_parent_profiles_1],['id_children','=',$id]])->update(['relationship'=>$request->relationship_1]);

            $parent_2 = ParentProfiles::find($request->id_parent_profiles_2);
            $parent_2->first_name = $request->first_name_parent_2;
            $parent_2->last_name = $request->last_name_parent_2;
            $parent_2->phone = $request->phone_parent_2;
            $parent_2->email = $request->email_parent_2;
            $parent_2->note = $request->note_parent_2;
            $parent_2->gender = $request->gender_parent_2;
            $parent_2->save();

            if ($request->hasFile('image_parent_2')) {
                // xoa anh cu
                if ($parent_2->image) {
                    $old_image = $parent_2->image;
                    unlink($old_image);
                }
                $file = $request->image_parent_2;
                $filename = Str::random(9) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/parent/'), $filename);
                $parent_2->image = 'images/parent/' . $filename;
                $parent_2->save();
            }

            DB::table('children_parent')->where([['id_parent','=',$request->id_parent_profiles_2],['id_children','=',$id]])->update(['relationship'=>$request->relationship_2]);
        }

        return redirect()->back()->with('notify', 'Updated Successfully');
    }

    public function destroy($id)
    {
        //
        $children_profiles = ChildrenProfiles::findOrFail($id);

        if($children_profiles->image){
            $old_image = $children_profiles->image;
            unlink($old_image);
        }

        $children_parent = ChildrenParent::where('id_children', '=', $id)->get();

        foreach ($children_parent as $child_parent) {
            //xoa parent cua children bi xoa
            $parent = ParentProfiles::where('id', '=', $child_parent->id_parent)->get();
            foreach ($parent as $person) {
                if($person->image){
                    $old_image = $person->image;
                    unlink($old_image);
                    // ko xoa parent. lay thong tin sau nay dem ban data lay tien
                }
            }
            $child_parent->delete();        //xoa children
        }

        $children_profiles->delete();

        $programs = Programs::all();
        return view('pages.children.child_profile',['programs'=>$programs])->with('notify', 'Deleted Successfully');
    }


    public function searchByName(Request $request)
    {
        $children_profiles = ChildrenProfiles::where('first_name', 'like', '%' . $request->get('q') . '%')
            ->orWhere('last_name', 'like', '%' . $request->get('q') . '%')
            ->orderBy('last_name')
            ->get();

        return response()->json($children_profiles);
    }

}
