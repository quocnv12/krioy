<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildrenStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('children_staff')->delete();
        DB::table('children_staff')->insert([
            [
                'id_children'   =>  1,
                'id_staff'      =>  1
            ],
            [
                'id_children'   =>  2,
                'id_staff'      =>  1
            ],
            [
                'id_children'   =>  3,
                'id_staff'      =>  1
            ],
            [
                'id_children'   =>  4,
                'id_staff'      =>  1
            ],
            [
                'id_children'   =>  5,
                'id_staff'      =>  1
            ],
            [
                'id_children'   =>  6,
                'id_staff'      =>  1
            ],
            [
                'id_children'   =>  7,
                'id_staff'      =>  1
            ],
            [
                'id_children'   =>  8,
                'id_staff'      =>  1
            ],
            [
                'id_children'   =>  9,
                'id_staff'      =>  1
            ],
            [
                'id_children'   =>  10,
                'id_staff'      =>  1
            ],
        ]);
    }
}
