<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class mealtype extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meal_type')->delete();
        DB::table('meal_type')->insert([
            ['id'=>1,'name'=>'Lunch'],
            ['id'=>2,'name'=>'Liquids'],
            ['id'=>3,'name'=>'Snacks'],
            ['id'=>4,'name'=>'Dinner'],
        ]);

    }
}
