<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('staff_programs')->insert([
           [
               'id_staff'       =>  1,
               'id_programs'    =>  1
           ],
            [
                'id_staff'       =>  1,
                'id_programs'    =>  2
            ],
            [
                'id_staff'       =>  1,
                'id_programs'    =>  3
            ],
            [
                'id_staff'       =>  1,
                'id_programs'    =>  1
            ],
            [
                'id_staff'       =>  2,
                'id_programs'    =>  1
            ],
            [
                'id_staff'       =>  2,
                'id_programs'    =>  2
            ],
            [
                'id_staff'       =>  3,
                'id_programs'    =>  4
            ],

        ]);
    }
}
