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
        DB::table('observations_type')->delete();
        DB::table('observations_type')->insert([
           [
               'name'   =>  'attendance'
           ],
            [
                'name'   =>  'behavior'
            ],
            [
                'name'   =>  'cognitive'
            ],
            [
                'name'   =>  'emotional'
            ],
            [
                'name'   =>  'language'
            ],
            [
                'name'   =>  'learning'
            ],
            [
                'name'   =>  'numbers'
            ],
            [
                'name'   =>  'social'
            ],
            [
                'name'   =>  'fine'
            ],
        ]);
    }
}
