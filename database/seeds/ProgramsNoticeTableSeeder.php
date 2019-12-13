<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsNoticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('programs_notice')->insert([
            [
                'id_programs'   =>  1,
                'id_notice'     =>  1
            ],
            [
                'id_programs'   =>  2,
                'id_notice'     =>  2
            ],
            [
                'id_programs'   =>  3,
                'id_notice'     =>  3
            ],
            [
                'id_programs'   =>  4,
                'id_notice'     =>  4
            ],
            [
                'id_programs'   =>  5,
                'id_notice'     =>  4
            ],
        ]);
    }
}
