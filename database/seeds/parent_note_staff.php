<?php

use Illuminate\Database\Seeder;

class parent_note_staff extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_note_staff')->delete();
        DB::table('parent_note_staff')->insert([
            ['id_staff' => '1', 'id_parentnote' => '2'],
            ['id_staff' => '1', 'id_parentnote' => '4'],
            ['id_staff' => '2', 'id_parentnote' => '2'],
            ['id_staff' => '2', 'id_parentnote' => '4'],
           
        ]);
    }
}
