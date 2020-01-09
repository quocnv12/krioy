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
        DB::table('food_items')->delete();
        DB::table('food_items')->insert([
            [
                'id'        =>  1,
                'food_name' =>  'Fish'
            ],
            [
                'id'        =>  2,
                'food_name' =>  'Shrimp'
            ],
            [
                'id'        =>  3,
                'food_name' =>  'Crab'
            ],
            [
                'id'        =>  4,
                'food_name' =>  'Snack'
            ],
            [
                'id'        =>  5,
                'food_name' =>  'Butter'
            ],
            [
                'id'        =>  6,
                'food_name' =>  'Bread'
            ],
            [
                'id'        =>  7,
                'food_name' =>  'Chips'
            ],
            [
                'id'        =>  8,
                'food_name' =>  'Coffee'
            ],
            [
                'id'        =>  9,
                'food_name' =>  'Vegetables'
            ],
            [
                'id'        =>  10,
                'food_name' =>  'Chicken'
            ],
        ]);
    }
}
