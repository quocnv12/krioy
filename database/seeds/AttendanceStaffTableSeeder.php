<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('attendance_staff')->insert([
            [
                'id'            =>1,
                'id_staff'      =>1,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2012
            ],
            [
                'id'            =>2,
                'id_staff'      =>2,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2012
            ],
            [
                'id'            =>3,
                'id_staff'      =>3,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2012
            ],
            [
                'id'            =>4,
                'id_staff'      =>4,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2012
            ],
            [
                'id'            =>5,
                'id_staff'      =>5,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2012
            ]
        ]);
    }
}
