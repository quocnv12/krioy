<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildrenParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('children_parent')->insert([
            [
                'id'            =>  1,
                'id_children'   =>  1,
                'id_parent'     =>  1
            ],
            [
                'id'            =>  2,
                'id_children'   =>  2,
                'id_parent'     =>  1
            ],
            [
                'id'            =>  3,
                'id_children'   =>  3,
                'id_parent'     =>  3
            ],
            [
                'id'            =>  4,
                'id_children'   =>  4,
                'id_parent'     =>  4
            ],
            [
                'id'            =>  5,
                'id_children'   =>  5,
                'id_parent'     =>  1
            ],
            [
                'id'            =>  6,
                'id_children'   =>  6,
                'id_parent'     =>  2
            ],
            [
                'id'            =>  7,
                'id_children'   =>  7,
                'id_parent'     =>  3
            ],
            [
                'id'            =>  8,
                'id_children'   =>  8,
                'id_parent'     =>  4
            ],
            [
                'id'            =>  9,
                'id_children'   =>  9,
                'id_parent'     =>  6
            ],
            [
                'id'            =>  10,
                'id_children'   =>  10,
                'id_parent'     =>  5
            ],
        ]);
    }
}
