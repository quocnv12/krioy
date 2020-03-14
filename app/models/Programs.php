<?php

namespace App\models;

use App\models\staff\StaffProfiles;
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

    public function program_chil()
    {
        return $this->belongsToMany(ChildrenProfiles::class, 'children_programs', 'id_program', 'id_children');
    }

    public function program_staff()
    {
        return $this->belongsToMany(StaffProfiles::class, 'staff_programs', 'id_program', 'id_staff');
    }

    public function program_notice()
    {
        return $this->belongsToMany(NoticeBoard::class, 'programs_notice', 'id_programs', 'id_notice');
    }
    public function parent_note()
    {
        return $this->hasMany('App\models\parentnote\parentnote', 'id_program', 'id');
    }
}
