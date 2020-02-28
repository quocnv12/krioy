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
        DB::table('observations')->delete();
        DB::table('observations')->insert([
            [
                'id'                =>  1,
                'id_children'       =>  1,
                'id_observations'   =>  '1,2,3',
            ],
            [
                'id'                =>  2,
                'id_children'       =>  2,
                'id_observations'   =>  '1,2,3',
                
               
            ],
            [
                'id'                =>  3,
                'id_children'       =>  3,
                'id_observations'   =>  '1,2,3',
                
               
            ],
            [
                'id'                =>  4,
                'id_children'       =>  4,
                'id_observations'   =>  '1,2,3',
                
               
            ],
            [
                'id'                =>  5,
                'id_children'       =>  5,
                'id_observations'   =>  '1,2,3',
                
               
            ],
        ]);
    }
}
