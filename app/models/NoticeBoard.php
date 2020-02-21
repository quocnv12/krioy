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

    public function notice_programs()
    {
        return $this->belongsToMany(Programs::class, 'programs_notice', 'id_notice', 'id_programs');
    }
}
