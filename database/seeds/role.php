<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::table('roles')->insert([
            ['id'=>'1','name'=>'Admin'],
            ['id'=>'2','name'=>'Ministry'],
            ['id'=>'3','name'=>'Security'],
            ['id'=>'4','name'=>'Housekeeper'],
            ['id'=>'5','name'=>'Finance'],
            ['id'=>'6','name'=>'Teacher'],
        ]);
    }
}
