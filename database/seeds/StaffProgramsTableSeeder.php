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
        DB::table('staff_programs')->delete();
        DB::table('staff_programs')->insert([
               [
                   'id_staff'       =>  1,
                   'id_program'    =>  1
               ],
            [
                'id_staff'       =>  2,
                'id_program'    =>  1
            ],
            [
                'id_staff'       =>  3,
                'id_program'    =>  1
            ],
            [
                'id_staff'       =>  4,
                'id_program'    =>  1
            ],
            [
                'id_staff'       =>  5,
                'id_program'    =>  2
            ],
            [
                'id_staff'       =>  6,
                'id_program'    =>  2
            ],
            [
                'id_staff'       =>  7,
                'id_program'    =>  2
            ],
            [
                'id_staff'       =>  8,
                'id_program'    =>  2
            ],
            [
                'id_staff'       => 9,
                'id_program'    =>  3
            ],
            [
                'id_staff'       =>  10,
                'id_program'    =>  3
            ],
            [
                'id_staff'       =>  11,
                'id_program'    =>  3
            ],
            [
                'id_staff'       =>  12,
                'id_program'    =>  3
            ],
            [
                'id_staff'       =>  13,
                'id_program'    =>  4
            ],
            [
                'id_staff'       =>  14,
                'id_program'    =>  4
            ],
            [
                'id_staff'       =>  15,
                'id_program'    =>  4
            ],
            [
                'id_staff'       =>  16,
                'id_program'    =>  4
            ],
            [
                'id_staff'       =>  17,
                'id_program'    =>  5
            ],
            [
                'id_staff'       =>  18,
                'id_program'    =>  5
            ],
            [
                'id_staff'       =>  19,
                'id_program'    =>  5
            ],
            [
                'id_staff'       =>  20,
                'id_program'    =>  5
            ],
        ]);
    }
}
