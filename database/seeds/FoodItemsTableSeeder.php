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
                'food_name' =>  'Canh cá'
            ],
            [
                'id'        =>  2,
                'food_name' =>  'Thịt rang'
            ],
            [
                'id'        =>  3,
                'food_name' =>  'Canh cua'
            ],
            [
                'id'        =>  4,
                'food_name' =>  'Cá kho'
            ],
            [
                'id'        =>  5,
                'food_name' =>  'Cháo'
            ],
            [
                'id'        =>  6,
                'food_name' =>  'Trứng rán'
            ],
            [
                'id'        =>  7,
                'food_name' =>  'Rau cải chips'
            ],
            [
                'id'        =>  8,
                'food_name' =>  'Canh mướp đắng'
            ],
            [
                'id'        =>  9,
                'food_name' =>  'Thịt bò'
            ],
            [
                'id'        =>  10,
                'food_name' =>  'Thịt gà'
            ],
        ]);
    }
}
