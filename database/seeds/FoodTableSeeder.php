<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('food')->delete();
        DB::table('food')->insert([
           [
               'id'         =>  1,
               'meal_type'  =>  1,
               'quantity'   =>  1,
               'id_program'    =>  1,
            //    'date_begin' => '2019-11-30',
            //    'date_end' => '2019-12-10'
             
           ],
            [
                'id'         =>  2,
               'meal_type'  =>  2,
               'quantity'   =>  2,
               'id_program'    =>  1,
            //    'date_begin' => '2019-11-30',
            //    'date_end' => '2019-12-10'
              
            ],
            [
                'id'         =>  3,
                'meal_type'  =>  3,
                'quantity'   =>  3,
                'id_program'    =>  2,
            //     'date_begin' => '2019-11-30',
            //    'date_end' => '2019-12-10'
              
            ],
            [
                'id'         =>  4,
                'meal_type'  =>  4,
                'quantity'   =>  2,
                'id_program'    =>  3,
                // 'date_begin' => '2019-11-30',
                // 'date_end' => '2019-12-10'
                
            ],
            [
                'id'         =>  5,
                'meal_type'  =>  2,
                'quantity'   =>  2,
                'id_program'    =>  2,
                // 'date_begin' => '2019-11-30',
                // 'date_end' => '2019-12-10'
               
            ],
        ]);
    }
}
