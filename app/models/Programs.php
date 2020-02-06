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
        'start_time',
        'finish_time',
        'program_fee',
        'currency',
        'period_fee',
        'status',
    ];

    protected $timestamp = false;
}
