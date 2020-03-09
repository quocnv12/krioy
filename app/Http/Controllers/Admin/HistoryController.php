<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\History;

class HistoryController extends Controller
{
    public function index(){
        $history = History::all();

        return view('pages.history.list', compact('history'));
    }

    public function destroy($id)
    {
        $history = History::where('id', '=', $id)->first();
        if(! $history){
            return view('pages.not-found.notfound');
        }
        ($history->model)::destroy(explode(',',$history->id_records));
        $history->delete();

        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Xóa Thành Công' : 'Deleted Successfully');
    }
}
