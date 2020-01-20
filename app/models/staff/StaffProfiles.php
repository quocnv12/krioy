<?php

namespace App\models\staff;

use Illuminate\Database\Eloquent\Model;

class StaffProfiles extends Model
{
    protected $table = 'staff_profiles';

    public function programstaff()
    {
        return $this->belongsToMany('App\models\Programs', 'staff_programs', 'id_staff', 'id_program');
    }
    public function pesmissionstaff()
    {
        return $this->belongsToMany('App\models\staff\role', 'staff_roles', 'id_staff', 'id_role');
    }
}
