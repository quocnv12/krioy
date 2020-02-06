<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('attendance_children')->delete();
        DB::table('attendance_children')->insert([
            [

                'id'            =>1,

                'id_children'   =>1,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
            [
                'id'            =>2,
                'id_children'   =>2,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
            [
                'id'            =>3,
                'id_children'   =>3,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
            [
                'id'            =>4,
                'id_children'   =>4,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
            [
                'id'            =>10,
                'id_children'   =>5,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
            [
                'id'            =>5,
                'id_children'   =>6,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
            [
                'id'            =>6,
                'id_children'   =>7,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
            [
                'id'            =>7,
                'id_children'   =>8,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
            [
                'id'            =>8,
                'id_children'   =>9,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
            [
                'id'            =>9,
                'id_children'   =>10,
                'total_come'    =>20,
                'total_absent'  =>2,
                'month'         =>10,
                'year'          =>2019,
                'created_at'    =>'2019-02-04 16:52:33',
                'updated_at'    =>'2019-02-04 16:52:33',
            ],
        ]);
    }
}
