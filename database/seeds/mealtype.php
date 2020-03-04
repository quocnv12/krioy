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
            ['id'=>1,'name'=>'Bữa sáng'],
            ['id'=>2,'name'=>'Bữa trưa'],
            ['id'=>3,'name'=>'Bữa chiều'],
            ['id'=>4,'name'=>'Bữa tối'],
        ]);
    }
}
