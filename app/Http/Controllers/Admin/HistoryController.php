<?php

namespace App\Http\Controllers\Admin;

use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\History;

class HistoryController extends Controller
{
    public function index(){
        $history = History::whereDate('created_at','=',today())->orderBy('created_at', 'desc')->get();
//        dd($history);
        $programs = Programs::all();
        return view('pages.history.list', compact('history','programs'));
    }

    public function search(Request $request){
        $comparisions = [
            'id_program' => '=',
            'model' => '='
        ];
        $programs = Programs::all();

        if ($request->from_date != null || $request->to_date != null){
            $today = date('Y-m-d',strtotime(today()));
            if ($request->from_date == null){
                $request->from_date = $today;
            }
            if ($request->to_date == null){
                $request->to_date = $today;
            }
            $history_all = History::whereBetween('created_at', [date($request->from_date)." 00:00:00", date($request->to_date)." 23:59:59"])->select('*')->orderBy('created_at', 'desc');
        }
        else{
            $history_all = History::select('*')->orderBy('created_at', 'desc');
        }

        foreach($comparisions as $key => $comparision)
        {
            $value = $request->{$key};
            if(isset($value))
            {
                $history_all->where($key,$comparision,$comparision == 'LIKE' ? "%{$value}%" : $value);
            }
        }

        $history = $history_all->get();

        return view('pages.history.list', compact('history','programs'));

    }

    public function destroy($id)
    {
        $history = History::where('id', '=', $id)->first();
        if(! $history){
            return view('pages.not-found.notfound');
        }

        foreach(explode(',',$history->id_records) as $id)
        {
            $obj = ($history->model)::where('id','=',$id)->first();
            if ($obj->clip_board){
                foreach (explode('/*endfile*/', $obj->clip_board) as $key => $value) {
                    $file_path = '/app/public/clip_board/' . $value;
                    if ($file_path != '/app/public/clip_board/') {
                        unlink(storage_path($file_path));
                    }
                }
            }
            $obj->delete();
        }

        $history->delete();

        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Xóa Thành Công' : 'Deleted Successfully');
    }
}
