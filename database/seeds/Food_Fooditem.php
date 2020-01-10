<?php

use Illuminate\Database\Seeder;

class Food_Fooditem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food_food_items')->delete();
        DB::table('food_food_items')->insert([
            [
               'id_food'       =>  1,
               'id_food_items'    =>  1
            ],
            [
                'id_food'       =>  1,
                'id_food_items'    =>  2
            ],
            [
                'id_food'       =>  1,
                'id_food_items'    =>  3
            ],
            [
                'id_food'       =>  1,
                'id_food_items'    =>  4
            ],


            [
                'id_food'       =>  2,
                'id_food_items'    =>  5
            ],
            [
                'id_food'       =>  2,
                'id_food_items'    =>  6
            ],
            
            [
                'id_food'       =>  2,
                'id_food_items'    =>  7
            ],
            

            [
                'id_food'       =>  3,
                'id_food_items'    =>  1
            ],
            [
                'id_food'       =>  3,
                'id_food_items'    =>  8
            ],
            [
                'id_food'       =>  3,
                'id_food_items'    =>  3
            ],
            [
                'id_food'       =>  4,
                'id_food_items'    =>  2
            ],
            [
                'id_food'       =>  4,
                'id_food_items'    =>  3
            ],
            [
                'id_food'       =>  4,
                'id_food_items'    =>  4
            ],
            [
                'id_food'       =>  5,
                'id_food_items'    =>  4
            ],
            [
                'id_food'       =>  5,
                'id_food_items'    =>  6
            ],
            [
                'id_food'       =>  5,
                'id_food_items'    =>  8
            ],
        ]);
    }
}
