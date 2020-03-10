<?php

namespace App\Http\Controllers\Admin;

use App\models\DiaryType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiaryTypeController extends Controller
{

    public function index()
    {
        $diary_types = DiaryType::all();
        return view('pages.diaryType.list', compact('diary_types'));
    }


    public function create()
    {
        return view('pages.diaryType.add');
    }


    public function store(Request $request)
    {
        $validation_vi = [
            'name.required' => 'Vui lòng nhập tên loại nhật ký !',
            'name.unique' => 'Tên loại nhật ký đã tồn tại !'
        ];

        $validation_en = [
            'name.required' => 'Please input name !',
            'name.unique' => 'Diary type already exist !'
        ];

        $this->validate($request,
            [
                'name' =>'required|unique:diary_types,name'
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);

        $diary_types = DiaryType::create($request->all());
        $diary_types->save();

        return redirect()->back()->with('success',  app()->getLocale() == 'vi' ? 'Thêm Thành Công !' : 'Added Successfully !');
    }

    public function edit($id)
    {
        $diary_types = DiaryType::find($id);
        return view('pages.diaryType.edit', compact('diary_types'));
    }


    public function update(Request $request, $id)
    {
        $validation_vi = [
            'name.required' => 'Vui lòng nhập tên loại nhật ký !',
            'name.unique' => 'Tên loại nhật ký đã tồn tại !'
        ];

        $validation_en = [
            'name.required' => 'Please input name !',
            'name.unique' => 'Diary type already exist !'
        ];
        $this->validate($request,
            [
                'name' => 'required|unique:diary_types,name,' . $id
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);

        $diary_types = DiaryType::find($id);
        $diary_types->update($request->all());
        $diary_types->save();

        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Cập Nhật Thành Công !' : 'Updated Successfully !');

    }


    public function destroy($id)
    {
        $diary_types= DiaryType::find($id);
        if (! $diary_types){
            return view('pages.not-found.notfound');
        }

        $diary_types->delete();

        return redirect(route('admin.diary_types.list'))->with('success',app()->getLocale() == 'vi' ? 'Xóa Thành Công !' : 'Deleted Successfully !');
    }
}
