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
        DB::table('staff_profiles')->insert([
            [
               'first_name'         =>  'laura',
                'last_name'         =>  'robert',
                'phone'             =>  '45616813',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
                'permission'        =>  'none',
                'status'            =>  1
            ],
            [
                'first_name'        =>  'finley',
                'last_name'         =>  'has',
                'phone'             =>  '5635435',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'B',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
                'permission'        =>  'none',
                'status'            =>  1
            ],
            [
                'first_name'        =>  'yeyeey',
                'last_name'         =>  'bomomo',
                'phone'             =>  '342423',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
                'permission'        =>  'none',
                'status'            =>  1
            ],
            [
                'first_name'        =>  'stuart',
                'last_name'         =>  'fff',
                'phone'             =>  '7665',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
                'permission'        =>  'none',
                'status'            =>  1
            ],
            [
                'first_name'        =>  'bob',
                'last_name'         =>  'robert',
                'phone'             =>  '4543534',
                'image'             =>  'image',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
                'exist'             =>  1,
                'permission'        =>  'none',
                'status'            =>  1
            ],
        ]);
    }
}
