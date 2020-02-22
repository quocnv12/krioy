<?php

namespace App\Http\Controllers\Api\Parent;

use App\models\Children_status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStatus($id)
    {
        $children_status = Children_status::where('id_children','=',$id)->orderBy('created_at','DESC')->get();

        return response()->json([
           'children_status'=>$children_status
        ], 200);
    }


}
