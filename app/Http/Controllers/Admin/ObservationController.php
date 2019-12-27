<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObservationController extends Controller
{
    protected $table = 'observations_type';

    protected $fillable = [
        'id',
        'name',
    ];

    public $timestamps = false;
}
