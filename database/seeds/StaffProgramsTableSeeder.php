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
                'id_staff'       =>  1,
                'id_program'    =>  2
            ],
            [
                'id_staff'       =>  1,
                'id_program'    =>  3
            ],
            [
                'id_staff'       =>  2,
                'id_program'    =>  1
            ],
            [
                'id_staff'       =>  2,
                'id_program'    =>  2
            ],
            [
                'id_staff'       =>  3,
                'id_program'    =>  4
            ],
        ]);
    }
}
