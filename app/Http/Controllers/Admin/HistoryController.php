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
        $programs = Programs::all();
        return view('pages.history.list', compact('history','programs'));
    }

    public function search(Request $request){
        $comparisions = [
            'id_program' => '=',
            'model' => '='
        ];
        $programs = Programs::all();

        if ($request->from_date != null && $request->to_date != null){
            $history_all = History::whereBetween('created_at', [date($request->from_date)." 00:00:00", date($request->to_date)." 23:59:59"])->select('*');
        }else{
            $history_all = History::select('*');
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
        ($history->model)::destroy(explode(',',$history->id_records));
        $history->delete();

        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Xóa Thành Công' : 'Deleted Successfully');
    }
}
