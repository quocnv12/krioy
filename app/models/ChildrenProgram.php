<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ChildrenProgram extends Model
{
    //
    protected $table = 'children_programs';

    protected $fillable = [
          'id_children',
          'id_program'
    ];

    public $timestamps = false;
}
