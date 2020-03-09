<?php

use Illuminate\Database\Seeder;

class parent_note_childrent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_note_children')->delete();
        DB::table('parent_note_children')->insert([
            ['id_children' => '1', 'id_parentnote' => '1'],
            ['id_children' => '1', 'id_parentnote' => '3'],
            ['id_children' => '2', 'id_parentnote' => '1'],
            ['id_children' => '2', 'id_parentnote' => '3'],
           
        ]);
    }
}
