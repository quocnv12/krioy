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
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'password',
        'image',
        'gender',
        'email',
        'address',
        'birthday',
        'blood_group',
        'date_of_joining',
        'level',

        ];
}
