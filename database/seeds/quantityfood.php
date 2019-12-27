<?php

use Illuminate\Database\Seeder;

class quantityfood extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quantity_food')->delete();
        DB::table('quantity_food')->insert([
            ['id'=>1,'name'=>'All'],
            ['id'=>2,'name'=>'Most'],
            ['id'=>3,'name'=>'Some'],
            ['id'=>4,'name'=>'None'],
        ]);
    }
}
