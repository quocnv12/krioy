<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildrenProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('children_program')->delete();
        DB::table('children_program')->insert([
            [
                'id_children'   => 1,
                'id_program'    => 1
            ],
            [
                'id_children'   => 1,
                'id_program'    => 2
            ],
            [
                'id_children'   => 1,
                'id_program'    => 3
            ],
            [
                'id_children'   => 2,
                'id_program'    => 1
            ],
            [
                'id_children'   => 2,
                'id_program'    => 4
            ],
            [
                'id_children'   => 2,
                'id_program'    => 5
            ],
            [
                'id_children'   => 3,
                'id_program'    => 1
            ],
            [
                'id_children'   => 3,
                'id_program'    => 4
            ],
            [
                'id_children'   => 4,
                'id_program'    => 1
            ],
            [
                'id_children'   => 5,
                'id_program'    => 1
            ],
            [
                'id_children'   => 6,
                'id_program'    => 1
            ],
            [
                'id_children'   => 7,
                'id_program'    => 1
            ],
            [
                'id_children'   => 8,
                'id_program'    => 1
            ],
            [
                'id_children'   => 9,
                'id_program'    => 1
            ],
            [
                'id_children'   => 10,
                'id_program'    => 1
            ],
        ]);
    }
}
