<?php

use Illuminate\Database\Seeder;

class ParentModule extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_module')->delete();
        DB::table('parent_module')->insert([
            ['id'=>'1','name'=>'Pooty'],
            ['id'=>'2','name'=>'Star'],
            ['id'=>'3','name'=>'Sleep'],
            ['id'=>'4','name'=>'Video'],
            ['id'=>'5','name'=>'Fee'],
            ['id'=>'6','name'=>'Check In-Out'],
            ['id'=>'7','name'=>'Diary'],
            ['id'=>'8','name'=>'Food'],
            ['id'=>'9','name'=>'Health'],
            ['id'=>'10','name'=>'Photos'],
            ['id'=>'11','name'=>'Play $ Learn'],
        ]);
    }
}
