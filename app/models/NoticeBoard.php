<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class NoticeBoard extends Model
{
    //
    protected $table = 'notice_board';

    protected $fillable = [
        'title',
        'content',
        'writer'
    ];
}
