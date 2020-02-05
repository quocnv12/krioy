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
        DB::table('children_programs')->delete();
        DB::table('children_programs')->insert([
            [
                'id_children'   => 1,
                'id_program'    => 1
            ],
            [
                'id_children'   => 2,
                'id_program'    => 1
            ],
            [
                'id_children'   => 3,
                'id_program'    => 1
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
            [
                'id_children'   => 11,
                'id_program'    => 2
            ],
            [
                'id_children'   => 12,
                'id_program'    => 2
            ],
            [
                'id_children'   => 13,
                'id_program'    => 2
            ],
            [
                'id_children'   => 14,
                'id_program'    => 2
            ],
            [
                'id_children'   => 15,
                'id_program'    => 2
            ],
            [
                'id_children'   => 16,
                'id_program'    => 2
            ],
            [
                'id_children'   => 17,
                'id_program'    => 2
            ],
            [
                'id_children'   => 18,
                'id_program'    => 2
            ],
            [
                'id_children'   => 19,
                'id_program'    => 2
            ],
            [
                'id_children'   => 20,
                'id_program'    => 2
            ],
            [
                'id_children'   => 21,
                'id_program'    => 3
            ],
            [
                'id_children'   => 22,
                'id_program'    => 3
            ],
            [
                'id_children'   => 23,
                'id_program'    => 3
            ],
            [
                'id_children'   => 24,
                'id_program'    => 3
            ],
            [
                'id_children'   => 25,
                'id_program'    => 3
            ],
            [
                'id_children'   => 26,
                'id_program'    => 3
            ],
            [
                'id_children'   => 27,
                'id_program'    => 3
            ],
            [
                'id_children'   => 28,
                'id_program'    => 3
            ],
            [
                'id_children'   => 29,
                'id_program'    => 3
            ],
            [
                'id_children'   => 30,
                'id_program'    => 3
            ],
            [
                'id_children'   => 31,
                'id_program'    => 4
            ],
            [
                'id_children'   => 32,
                'id_program'    => 4
            ],
            [
                'id_children'   => 33,
                'id_program'    => 4
            ],
            [
                'id_children'   => 34,
                'id_program'    => 4
            ],
            [
                'id_children'   => 35,
                'id_program'    => 4
            ],
            [
                'id_children'   => 36,
                'id_program'    => 4
            ],
            [
                'id_children'   => 37,
                'id_program'    => 4
            ],
            [
                'id_children'   => 38,
                'id_program'    => 4
            ],
            [
                'id_children'   => 39,
                'id_program'    => 4
            ],
            [
                'id_children'   => 40,
                'id_program'    => 5
            ],
            [
                'id_children'   => 41,
                'id_program'    => 5
            ],
            [
                'id_children'   => 42,
                'id_program'    => 5
            ],
            [
                'id_children'   => 43,
                'id_program'    => 5
            ],
            [
                'id_children'   => 44,
                'id_program'    => 5
            ],
            [
                'id_children'   => 45,
                'id_program'    => 5
            ],
            [
                'id_children'   => 46,
                'id_program'    => 5
            ],
            [
                'id_children'   => 47,
                'id_program'    => 5
            ],
            [
                'id_children'   => 48,
                'id_program'    => 5
            ],
            [
                'id_children'   => 49,
                'id_program'    => 5
            ],
            [
                'id_children'   => 50,
                'id_program'    => 5
            ],
        ]);
    }
}
