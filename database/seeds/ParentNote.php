<?php

use Illuminate\Database\Seeder;

class ParentNote extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_note')->delete();
        DB::table('parent_note')->insert([
            ['id'=>1,'title'=>'Food','id_program'=>1,'id_children' => 1],
            ['id'=>2,'title'=>'Other','id_program'=>2,'id_children' => 2],
            ['id'=>3,'title'=>'Leave','id_program'=>1,'id_children' => 1],
            ['id'=>4,'title'=>'Health','id_program'=>2,'id_children' => 2],
        ]);
    }
}
