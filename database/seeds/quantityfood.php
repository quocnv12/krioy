<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['id'=>1,'name'=>'Tất cả'],
            ['id'=>2,'name'=>'Một ít'],
            ['id'=>3,'name'=>'Phần lớn'],
        ]);
    }
}
