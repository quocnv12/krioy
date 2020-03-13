<?php

namespace App\Http\Controllers\Api;

use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\History;

class HistoryController extends Controller
{
    public function index(){
        $history = History::whereDate('created_at','=',today())->orderBy('created_at', 'desc')->get();
        $programs = Programs::all();
        return response()->json([
           'history'    =>  $history,
           'programs'   =>  $programs
        ]);
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

        return response()->json([
           'programs'   =>  $programs,
           'history'    =>  $history
        ]);

    }

    public function destroy($id)
    {
        $history = History::where('id', '=', $id)->first();
        if(! $history){
            return response()->json(['message'=>'Something wrong'], 404);
        }
        ($history->model)::destroy(explode(',',$history->id_records));
        $history->delete();

        return response()->json(null, 204);
    }
}
