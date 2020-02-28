<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\StoreChildrenNoExistParentRequest;
use App\Http\Requests\StoreChildrenYesExistParentRequest;
use App\models\ChildrenParent;
use App\models\ChildrenProfiles;
use App\models\ChildrenProgram;
use App\models\ParentProfiles;
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Mail;
class ChildrenProfilesController extends Controller
{
    public function index()
    {
        $programs = Programs::orderBy('program_name')->get();
        return view('pages.children.child_profile', compact('programs'));
    }

    public function create()
    {
        $programs = Programs::orderBy('program_name')->get();
        return view('pages.children.create_child', compact('programs'));
    }

    public function store(Request $request)
    {
        if ($request->parent_exist == '0' || $request->parent_exist == null) {  //ko trung parent
            $validate = new StoreChildrenNoExistParentRequest();
            $this->validate($request, $validate->rules(), $validate->messages());
        }else{                                                                  //trung parent
            $validate = new StoreChildrenYesExistParentRequest();
            $this->validate($request, $validate->rules(), $validate->messages());
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
                $image = Image::make(public_path('images/parent/'.$filename))->fit(150,150);
                $image->save();
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
                $image = Image::make(public_path('images/parent/'.$filename))->fit(150,150);
                $image->save();
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
            $image = Image::make(public_path('images/children/'.$filename))->fit(150,150);
            $image->save();
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

        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Thêm Thành Công !' :'Added Successfully !');
    }



    public function show($id)
    {
        $programs = Programs::orderBy('program_name')->get();
        if ($id == 0){
            $children_profiles = DB::table('children_profiles')
                ->leftJoin('children_programs', 'children_profiles.id', '=', 'children_programs.id_children')
                ->select(['children_profiles.*'])
                ->where('children_programs.id_program', '=', null)
                ->orderBy('children_profiles.first_name')
                ->simplePaginate(18);
        }
        else{
            $children_profiles = DB::table('programs')
                ->join('children_programs', 'programs.id', '=', 'children_programs.id_program')
                ->join('children_profiles', 'children_profiles.id', '=', 'children_programs.id_children')
                ->select(['children_profiles.*'])
                ->where('children_programs.id_program', '=', $id)
                ->orderBy('children_profiles.first_name')
                ->simplePaginate(18);
        }

        return view('pages.children.child_profile', ['children_profiles' => $children_profiles,'programs'=>$programs]);
    }

    public function view($id){
        $children_profiles = ChildrenProfiles::find($id);

        if (!$children_profiles){
            return view('pages.not-found.notfound');
        }
        $programs = Programs::orderBy('program_name')->get();
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


        return view('pages.children.view_child', [
            'children_profiles' => $children_profiles,
            'programs'=>$programs,
            'array_programs_choose' => $array_programs_choose,
            'parent_profiles' => $parent_profiles
        ]);

    }

    public function edit($id)
    {
        $children_profiles = ChildrenProfiles::find($id);
        if (!$children_profiles){
            return view('pages.not-found.notfound');
        }
        $programs = Programs::orderBy('program_name')->get();

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

            return view('pages.children.edit_child', [
                'children_profiles' => $children_profiles,
                'programs'=>$programs,
                'array_programs_choose' => $array_programs_choose,
                'parent_profiles'=>$parent_profiles
            ]);
    }

    public function update(Request $request, $id)
    {
        $validation_vi = [
            'first_name.required' => 'Trường này không được để trống',
            'last_name.required' => 'Trường này không được để trống',
            'gender.required' => 'Giới tính không được để trống',
            'image.image' => 'Ảnh không hợp lệ',
            'birthday.required' => 'Ngày sinh không được để trống',
            'birthday.before' => 'Ngày sinh quá lớn',
            'birthday.after' => 'Ngày sinh quá nhỏ',
            'date_of_joining.required' => 'Ngày nhập học không được để trống',
            'first_name_parent.required' => 'Trường này không được để trống',
            'last_name_parent.required' => 'Trường này không được để trống',
            'main_phone_parent.required' => 'Số điện thoại này không được để trống',
            'main_phone_parent.unique' => 'Số điện thoại đã tồn tại. Vui lòng thử số khác',
            'extra_phone_parent.unique' => 'Số điện thoại đã tồn tại. Vui lòng thử số khác',
            'main_phone_parent.size' => 'Số điện thoại phải bao gồm 10 chữ số',
            'extra_phone_parent.size' => 'Số điện thoại phải bao gồm 10 chữ số',
            'main_phone_parent.regex' => 'Số điện thoại không hợp lệ',
            'extra_phone_parent.regex' => 'Số điện thoại không hợp lệ',
            'extra_phone_parent.different' => 'Số điện thoại dự phòng phải khác với số điện thoại chính',
            'email_parent.required' => 'Email không được để trống',
            'email_parent.email' => 'Email không hợp lệ',
            'email_parent.unique' => 'Email đã tồn tại. Vui lòng thử email khác',
            'unique_id.unique' => 'Mã ID đã tồn tại',
            'unique_id.required' => 'Mã ID không được để trống',
            'image_parent.image' => 'Ảnh không hợp lệ',
        ];

        $validation_en = [
            'first_name.required'           => 'First Name is required',
            'last_name.required'            => 'Last Name is required',
            'gender.required'               => 'Gender is required',
            'image.image'                   => 'Image is invalid',
            'birthday.required'             => 'Birthday is required',
            'birthday.before'               => 'Birthday is invalid',
            'birthday.after'                => 'Birthday is invalid',
            'date_of_joining.required'      => 'Date of Joining is required',
            'first_name_parent.required'    =>  'First Name is required',
            'last_name_parent.required'     =>  'Last Name is required',
            'main_phone_parent.required'        => 'The phone number is required',
            'main_phone_parent.unique'        => 'This phone number has been taken',
            'extra_phone_parent.unique'        => 'This phone number has been taken',
            'main_phone_parent.size'        => 'The phone number must has 10 digits',
            'extra_phone_parent.size'        => 'The phone number must has 10 digits',
            'main_phone_parent.regex'        => 'The main phone number is invalid',
            'extra_phone_parent.regex'        => 'The extra phone number is invalid',
            'extra_phone_parent.different'        => 'This phone must different from main phone number',
            'email_parent.required'          => 'Email is required',
            'email_parent.email'          => 'Email is invalid',
            'email_parent.unique'         => 'This email has already been taken',
            'unique_id.unique'              => 'ID is exist',
            'unique_id.required'            => 'Unique ID is required',
            'image_parent.image'          => 'Image is invalid',
        ];

        $this->validate($request,
            [
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
            ],app()->getLocale() == ('vi') ? $validation_vi : $validation_en);

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
            $image = Image::make(public_path('images/children/'.$filename))->fit(150,150);
            $image->save();
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
            $image = Image::make(public_path('images/parent/'.$filename))->fit(150,150);
            $image->save();
            $parent_profiles->save();
        }
        $parent_profiles->save();

        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Cập Nhật Thành Công !' : 'Updated Successfully !');
    }

    public function destroy($id)
    {
        $children_profiles = ChildrenProfiles::find($id);
        if (!$children_profiles){
            return view('pages.not-found.notfound');
        }
        if($children_profiles->image != null){
            $old_image = $children_profiles->image;
            unlink($old_image);
        }

        $children_parent = ChildrenParent::where('id_children', '=', $id)->get();
        if (isset($children_parent)){
            foreach ($children_parent as $child_parent) {
                //xoa parent cua children bi xoa
                $parent = ParentProfiles::where('id', '=', $child_parent->id_parent)->first();
                if($parent->image != null){
                    $old_image = $parent->image;
                    unlink($old_image);
                    // ko xoa parent. lay thong tin sau nay dem ban data lay tien
                }

                DB::table('children_parent')->where('id_children','=',$child_parent)->delete();
            }
        }

        $children_profiles->delete();

        return redirect(route('admin.children.index'))->with('success',app()->getLocale() == 'vi' ? 'Xóa Thành Công !' : 'Deleted Successfully');
    }


    public function searchByName(Request $request)
    {
        $children_profiles = ChildrenProfiles::where(DB::raw("concat(first_name ,' ', last_name)"), 'like', '%' . $request->get('q') . '%')->orderBy('first_name')->get();

        return response()->json($children_profiles);
    }

}
