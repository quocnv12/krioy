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
                'food_name' =>  'fish'
            ],
            [
                'food_name' =>  'shrimp'
            ],
            [
                'food_name' =>  'crab'
            ],
            [
                'food_name' =>  'snack'
            ],
            [
                'food_name' =>  'butter'
            ],
            [
                'food_name' =>  'bread'
            ],
            [
                'food_name' =>  'chips'
            ],
            [
                'food_name' =>  'coffee'
            ],
            [
                'food_name' =>  'vegetables'
            ],
            [
                'food_name' =>  'chicken'
            ],
        ]);
    }
}
