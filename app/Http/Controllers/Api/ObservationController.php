<?php

namespace App\Http\Controllers\Api;

use App\models\ObservationTypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObservationController extends Controller
{

    public  function getListObservation(){
        $observationtype = ObservationTypeModel::all();
        return response()->json([
            'observationtype'=>$observationtype
        ], 200);
    }


}
