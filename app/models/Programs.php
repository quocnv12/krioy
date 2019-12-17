<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    //
    protected $table = 'programs';

    protected $fillable = [
        'program_name',
        'from_month',
        'to_month',
        'from_year',
        'to_year',
        'period',
        'start_time',
        'finish_time',
        'schedule',
        'program_fee',
        'status'
    ];

    protected $timestamp = false;
}
