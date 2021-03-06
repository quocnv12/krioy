<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreHeathRequests;
use App\models\ChildrenProfiles;
use App\models\ChildrenProgram;
use App\models\HealthModel;
use App\models\History;
use App\models\ObservationTypeModel;
use App\models\Programs;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class HealthController extends Controller
{
    public function getList()
    {

        $health = HealthModel::orderBy('created_at', 'DESC')->get();
        return view('pages.heath.list', compact('health'));
    }

    public function view($id)
    {
        $health = HealthModel::find($id);
        if ($id == 0) {
            return view('pages.not-found.notfound');
        }
        $children_profiles = ChildrenProfiles::where('id', $health->id_children)->first();
        return view('pages.heath.view', compact('health', 'children_profiles'));
    }

    public function getAdd()
    {
        $health = HealthModel::all();
        $programs = Programs::all();
        return view('pages.heath.add', compact('health', 'programs'));
    }

    public function postAdd(Request $request)
    {
        $validation_vi = [
            'children_health.required' => 'Vui lòng chọn trẻ',
        ];

        $validation_en = [
            'children_health.required' => 'Please choose children',
        ];

        $this->validate($request,
            [
                'children_health' => 'required',
                'sick' => 'nullable',
                'medicine' => 'nullable',
                'growth' => 'nullable',
                'incident' => 'nullable',
                'blood_group' => 'nullable',
            ], app()->getLocale() == 'vi' ? $validation_vi : $validation_en);

        //save history : create new history object
        $history = new History();
        $history->id_childrens = $request->children_health;
        $history->id_program = $request->program_id;
        $array_id_records = [];     //tao array chua id health record

        $array_file = [];
        if ($request->hasFile('clip_board')) {
            foreach ($request->file('clip_board') as $file_name) {
                $uniqueFileName = (Str::random(9). '_' .$file_name->getClientOriginalName());
                $file_name->move(storage_path('/app/public/clip_board/'), $uniqueFileName);
                array_push($array_file, $uniqueFileName);
            }
        }

        //create health object
        $array_children = explode(',', $request->children_health);
        foreach ($array_children as $children) {
            $health = new HealthModel();

            $health->id_children = $children;
            $health->sick = $request->sick;
            $health->medicine = $request->medicine;
            $health->growth = $request->growth;
            $health->growth_height = $request->growth_height;
            $health->growth_weight = $request->growth_weight;
            $health->growth_head_circumference = $request->growth_head_circumference;
            $health->incident = $request->incident;
            $health->blood_group = $request->blood_group;
            $health->clip_board = implode('/*endfile*/', $array_file);

            $health->save();

            //push id cua doi tuong health vao array
            array_push($array_id_records, $health->id);
        }

        //id_records la chuoi string chua id cua cac doi tuong health vua tao
        $history->id_records = implode(',',$array_id_records);
        $history->model = 'App\models\HealthModel';
        $history->icon = 'images/Health-01.png';
        $json_vi = [
            'Chủ Đề'    =>  'Sức Khỏe',
            'Ốm Đau'  =>  $health->sick,
            'Thuốc Thang'  =>  $health->medicine,
            'Phát Triển'  =>  $health->growth,
            'Chiều Cao'  =>  $health->growth_height . 'cm',
            'Cân Nặng'  =>  $health->growth_weight . 'kg',
            'Chu vi Đầu'  =>  $health->growth_head_circumference . 'cm',
            'Biến Dạng'  =>  $health->incident,
            'Nhóm Máu'  =>  $health->blood_group,
        ];

        $json_en = [
            'Model'    =>  'Health',
            'Sick'  =>  $health->sick,
            'Medicine'  =>  $health->medicine,
            'Growth'  =>  $health->growth,
            'Height'  =>  $health->growth_height . 'cm',
            'Weight'  =>  $health->growth_weight . 'kg',
            'Head Circumference'  =>  $health->growth_head_circumference . 'cm',
            'Incident'  =>  $health->incident,
            'Blood Group'  =>  $health->blood_group,
        ];

        $history->content_vi = json_encode($json_vi);
        $history->content_en = json_encode($json_en);
        $history->save();
        //save xong history record

        return redirect()->back()->with('success', app()->getLocale() == 'vi' ? 'Thêm Thành Công !' : 'Added Successfully !');
    }

//    public function getEdit($id)
//    {
//        $health = HealthModel::find($id);
//        if (!$id) {
//            return view('pages.not-found.notfound');
//        }
//        $children_profiles = ChildrenProfiles::where('id', $health->id_children)->first();
//
//        return view('pages.heath.edit', compact('health', 'children_profiles'));
//    }
//
//    public function postEdit(Request $request, $id)
//    {
//        $this->validate($request,
//            [
//                'sick' => 'nullable',
//                'medicine' => 'nullable',
//                'growth' => 'nullable',
//                'incident' => 'nullable',
//                'blood_group' => 'nullable',
//            ]);
//
//        $health = HealthModel::find($id);
//
//        $health->sick = $request->sick;
//        $health->medicine = $request->medicine;
//        $health->growth = $request->growth;
//        $health->growth_height = $request->growth_height;
//        $health->growth_weight = $request->growth_weight;
//        $health->growth_circumference = $request->growth_circumference;
//        $health->incident = $request->incident;
//        $health->blood_group = $request->blood_group;
//
//        if ($request->hasFile('clip_board')) {
//            $old_array = explode('/*endfile*/', $health->clip_board);
//            foreach ($request->file('clip_board') as $file_name) {
//                $uniqueFileName = (Str::random(9) . '_' . $file_name->getClientOriginalName() );
//                array_push($old_array, $uniqueFileName);
//                $file_name->move(storage_path('/app/public/clip_board/'), $uniqueFileName);
//            }
//            $health->clip_board = implode('/*endfile*/', $old_array);
//        }
//
//        $health->save();
//
//        return redirect()->back()->with('success', app()->getLocale() == 'vi' ? 'Cập Nhật Thành Công !' : 'Updated Successfully !');
//
//    }

    public function getDelete($id)
    {
        $health = HealthModel::find($id);
        if (!$health) {
            return view('pages.not-found.notfound');
        }

        if ($health->clip_board) {
            $old_array = explode('/*endfile*/', $health->clip_board);
            foreach ($old_array as $key => $value) {
                $file_path = '/app/public/clip_board/' . $value;
                if ($file_path != '/app/public/clip_board/') {
                    unlink(storage_path($file_path));
                }
            }
        }

        $health->delete();
        return redirect(route('admin.health.list'))->with('success', app()->getLocale() == 'vi' ? 'Xóa Thành Công' : 'Deleted successfully');
    }

    public function displayClipboard($id, $name)
    {
        return response()->file(storage_path('/app/public/clip_board/' . $name), [
            'Content-Disposition' => 'inline; filename="' . $name . '"']);
    }

    public function deleteClipboard($id, $name)
    {
        $health = HealthModel::find($id);
        //chuoi cu
        $old_array = explode('/*endfile*/', $health->clip_board);

        $index = array_search($name, $old_array);
        array_splice($old_array, $index, 1);

        //cap nhat lai chuoi
        $health->clip_board = implode('/*endfile*/', $old_array);
        $health->save();

        //xoa file
        $file_path = storage_path('/app/public/clip_board/' . $name);
        unlink($file_path);

        return redirect()->back()->with('success', 'Deleted File');
    }

    public function searchByName(Request $request)
    {
        $children_profiles = ChildrenProfiles::where(DB::raw("concat(first_name ,' ', last_name)"), 'like', '%' . $request->get('q') . '%')->get();

        return response()->json($children_profiles);
    }

    public function showChildrenInProgram($id)
    {
        $observationtype = ObservationTypeModel::all();
        $programs = Programs::all();
        $children_profiles = DB::table('children_profiles')
            ->join('children_programs', 'children_profiles.id', '=', 'children_programs.id_children')
            ->where('children_programs.id_program', '=', $id)
            ->orderBy('children_profiles.first_name')
            ->get();

        $program_id = $id;

        return view('pages.heath.add', [
            'children_profiles' => $children_profiles,
            'observationtype' => $observationtype,
            'programs' => $programs,
            'program_id'=>$program_id
        ]);
    }

    public function excel($id)
    {
        $health = HealthModel::find($id);
        $children_data = ChildrenProfiles::where('id', $health->id_children)->first();

        $health_array[] = array(
            'Họ Tên',
            'Ngày Sinh',
            'Ốm Đau',
            'Thuốc Thang',
            'Chiều Cao',
            'Cân Nặng',
            'Chu Vi Đầu',
            'Sự Tăng Trưởng',
            'Biến Dạng',
            'Nhóm Máu'
        );


        $health_array[] = array(
            'Họ Tên' => $children_data->first_name . ' ' . $children_data->last_name,
            'Ngày Sinh' => date('d-m-Y', strtotime($children_data->birthday)),
            'Ốm Đau' => $health->sick,
            'Thuốc Thang' => $health->medicine,
            'Chiều Cao' => $health->growth_height,
            'Cân Nặng' => $health->growth_weight,
            'Chu Vi Đầu' => $health->growth_circumference,
            'Sự Tăng Trưởng' => $health->growth,
            'Biến Dạng' => $health->incident,
            'Nhóm Máu' => $health->blood_group
        );


        Excel::create($children_data->first_name . ' ' . $children_data->last_name, function ($excel) use ($health_array) {
            $excel->setTitle('Children Data');

            $excel->sheet('Children Data', function ($sheet) use ($health_array) {
                $sheet->fromArray($health_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }


}
