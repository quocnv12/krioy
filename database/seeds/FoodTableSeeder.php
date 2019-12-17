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
               'quantity'   =>  1,
               'meal_type'  =>  'morning',
               'id_food'    =>  1,
               'file_image' =>  'file_image',
               'file_pdf'   =>  'file_pdf',
           ],
            [
                'id'         =>  2,
                'quantity'   =>  2,
                'meal_type'  =>  'dinner',
                'id_food'    =>  10,
                'file_image' =>  'file_image',
                'file_pdf'   =>  'file_pdf',
            ],
            [
                'id'         =>  3,
                'quantity'   =>  1,
                'meal_type'  =>  'lunch',
                'id_food'    =>  2,
                'file_image' =>  'file_image',
                'file_pdf'   =>  'file_pdf',
            ],
            [
                'id'         =>  4,
                'quantity'   =>  1,
                'meal_type'  =>  'morning',
                'id_food'    =>  4,
                'file_image' =>  'file_image',
                'file_pdf'   =>  'file_pdf',
            ],
            [
                'id'         =>  5,
                'quantity'   =>  1,
                'meal_type'  =>  'morning',
                'id_food'    =>  5,
                'file_image' =>  'file_image',
                'file_pdf'   =>  'file_pdf',
            ],
        ]);
    }
}
