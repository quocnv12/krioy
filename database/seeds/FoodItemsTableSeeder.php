<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('food_items')->insert([
            [
                'id'        =>  1,
                'food_name' =>  'fish'
            ],
            [
                'id'        =>  2,
                'food_name' =>  'shrimp'
            ],
            [
                'id'        =>  3,
                'food_name' =>  'crab'
            ],
            [
                'id'        =>  4,
                'food_name' =>  'snack'
            ],
            [
                'id'        =>  5,
                'food_name' =>  'butter'
            ],
            [
                'id'        =>  6,
                'food_name' =>  'bread'
            ],
            [
                'id'        =>  7,
                'food_name' =>  'chips'
            ],
            [
                'id'        =>  8,
                'food_name' =>  'coffee'
            ],
            [
                'id'        =>  9,
                'food_name' =>  'vegetables'
            ],
            [
                'id'        =>  10,
                'food_name' =>  'chicken'
            ],
        ]);
    }
}
