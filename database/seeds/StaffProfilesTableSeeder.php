<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('staff_profiles')->delete();
        DB::table('staff_profiles')->insert([
            [
                'id'=>1,
               'first_name'         =>  'laura',
                'last_name'         =>  'robert',
                'phone'             =>  '0912345678',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
                'status'            =>  1
            ],
            [
                'id'=>2,
                'first_name'        =>  'finley',
                'last_name'         =>  'has',
                'phone'             =>  '0912345679',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'B',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
                
                'status'            =>  1
            ],
            [
                'id'=>3,
                'first_name'        =>  'yeyeey',
                'last_name'         =>  'bomomo',
                'phone'             =>  '0912345670',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
               
                'status'            =>  1
            ],
            [
                'id'=>4,
                'first_name'        =>  'stuart',
                'last_name'         =>  'fff',
                'phone'             =>  '0912345671',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
              
                'status'            =>  1
            ],
            [
                'id'=>5,
                'first_name'        =>  'bob',
                'last_name'         =>  'robert',
                'phone'             =>  '0912345672',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
                'status'            =>  1
            ],
        ]);
    }
}
