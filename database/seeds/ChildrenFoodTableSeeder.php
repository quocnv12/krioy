<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildrenFoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('children_food')->delete();
        DB::table('children_food')->insert([
            [
                'id_children'   =>  1,
                'id_food'       =>  1
            ],
            [
                

                'id_children'   =>  1,
                'id_food'       =>  2
            ],
            [
               

                'id_children'   =>  2,
                'id_food'       =>  3
            ],
            [
            

                'id_children'   =>  3,
                'id_food'       =>  4
            ],
        ]);
    }
}
