<?php

namespace App\Http\Controllers\Admin;

use App\models\ObservationModel;
use App\models\ObservationTypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObservationController extends Controller
{
    public function index(){
        $observation= ObservationModel::all();
        return view('pages.observation.select_child', compact('observation'));
    }
    public function create(){

        $observation= ObservationModel::all();
        $observationtype = ObservationTypeModel::where('id',1)->get();
        return view('pages.observation.observation', compact('observation','observationtype'));
    }

}
