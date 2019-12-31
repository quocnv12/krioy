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
               'meal_type'  =>  'Lunch',
               'quantity'   =>  'All',
               'id_program'    =>  1,
             
           ],
            [
                'id'         =>  2,
               'meal_type'  =>  'Dinner',
               'quantity'   =>  'Most',
               'id_program'    =>  1,
              
            ],
            [
                'id'         =>  3,
                'meal_type'  =>  'Snacks',
                'quantity'   =>  'Some',
                'id_program'    =>  2,
              
            ],
            [
                'id'         =>  4,
                'meal_type'  =>  'Liquids',
                'quantity'   =>  'Most',
                'id_program'    =>  3,
                
            ],
            [
                'id'         =>  5,
                'meal_type'  =>  'Lunch',
                'quantity'   =>  'All',
                'id_program'    =>  2,
               
            ],
        ]);
    }
}
