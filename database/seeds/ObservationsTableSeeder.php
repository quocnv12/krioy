<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('observations')->insert([
            [
                'id_children'       =>  1,
                'id_observations'   =>  1
            ],
            [
                'id_children'       =>  1,
                'id_observations'   =>  2
            ],
            [
                'id_children'       =>  1,
                'id_observations'   =>  3
            ],
            [
                'id_children'       =>  2,
                'id_observations'   =>  4
            ],
            [
                'id_children'       =>  2,
                'id_observations'   =>  5
            ],
            [
                'id_children'       =>  3,
                'id_observations'   =>  6
            ],
            [
                'id_children'       =>  4,
                'id_observations'   =>  7
            ],
        ]);
    }
}
