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

                'id'                =>  1,
                'first_name'        => 'Laura',
                'last_name'         =>  'Robert',
                'phone'             =>  '0912345678',
                'image'             =>  'Staff-01.png',
                'gender'            =>  1,
                'email'             =>  'kingofking.vnn90@gmail.com',
                'address'           =>  'hcm city',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
            ],
            [

                'id'                =>  2,
                'first_name'        =>  'Finley',
                'last_name'         =>  'Has',
                'phone'             =>  '0912345679',
                'image'             =>  'Staff-01.png',
                'gender'            =>  2,
                'email'             =>  'robert@gmail.com',
                'address'           =>  '116 Xuân Thủy Cầu Giấy Hà Nội',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'B',
                'date_of_joining'   =>  '2000-10-10',
            ],
            [

                'id'                =>  3,
                'first_name'        =>  'Yeyeey',
                'last_name'         =>  'Bomomo',
                'phone'             =>  '0912345670',
                'image'             =>  'Staff.png',
                'gender'            =>  2,
                'email'             =>  'robert@gmail.com',
                'address'           =>  '116 Xuân Thủy Hai Bà Trưng Hà Nội',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
            ],
            [

                'id'                =>  4,
                'first_name'        =>  'Stuart',
                'last_name'         =>  'Join',
                'phone'             =>  '0912345671',
                'image'             =>  'Staff.png',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  '116 Cửa Nam Hoàn Kiếm Hà Nội',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
            ],
            [

                'id'                =>  5,
                'first_name'        =>  'Bob',
                'last_name'         =>  'Robert',
                'phone'             =>  '0912345672',
                'image'             =>  'Staff-01.png',
                'gender'            =>  1,
                'email'             =>  'robert@gmail.com',
                'address'           =>  '116 Xuân Thủy Cầu Giấy Hà Nội',
                'birthday'          =>  '1990-12-12',
                'blood_group'       =>  'A',
                'date_of_joining'   =>  '2000-10-10',
            ],
        ]);
    }
}
