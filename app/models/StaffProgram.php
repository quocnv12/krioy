<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class StaffProgram extends Model
{
    //
    protected $table = 'staff_programs';
    protected $fillable = [
        'id_staff',
        'id_program'
    ];
}
