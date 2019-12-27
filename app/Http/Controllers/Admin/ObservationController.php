<?php

namespace App\Http\Controllers\Admin;

use App\models\ObservationModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObservationController extends Controller
{
    public function index(){
        $observation= ObservationModel::all();
        return view('pages.observation.observation', compact('observation'));
    }
    public function create(){

        $observation= ObservationModel::all();
        return view('pages.observation.observation', compact('observation'));
    }

}
