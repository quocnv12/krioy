<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObservationsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('observations_type')->insert([
           [
               'id'     =>  1,
               'name'   =>  'attendance'
           ],
            [
                'id'     =>  2,
                'name'   =>  'behavior'
            ],
            [
                'id'     =>  3,
                'name'   =>  'cognitive'
            ],
            [
                'id'     =>  4,
                'name'   =>  'emotional'
            ],
            [
                'id'     =>  5,
                'name'   =>  'language'
            ],
            [
                'id'     =>  6,
                'name'   =>  'learning'
            ],
            [
                'id'     =>  7,
                'name'   =>  'numbers'
            ],
            [
                'id'     =>  8,
                'name'   =>  'social'
            ],
            [
                'id'     =>  9,
                'name'   =>  'fine'
            ],
        ]);
    }
}
