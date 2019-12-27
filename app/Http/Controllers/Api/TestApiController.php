<?php

namespace App\Http\Controllers\Api;
use App\models\ChildrenProfiles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestApiController extends Controller
{
    public function GetTest() {
        return response()->json([
            'test' => ChildrenProfiles::get()
        ], 200 );
    }
}
