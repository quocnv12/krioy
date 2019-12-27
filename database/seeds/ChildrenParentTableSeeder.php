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
        DB::table('children_parent')->delete();
        DB::table('children_parent')->insert([
            [
                'id_children'   =>  1,
                'id_parent'     =>  1,
                'relationship'  =>  'mother'
            ],
            [
                

                'id_children'   =>  2,
                'id_parent'     =>  1,
                'relationship'  =>  'mother'

            ],
            [
                'id_children'   =>  3,
                'id_parent'     =>  3,
                'relationship'  =>  'mother'
            ],
            [
                'id_children'   =>  4,
                'id_parent'     =>  4,
                'relationship'  =>  'mother'

            ],
            [
                'id_children'   =>  5,
                'id_parent'     =>  1,
                'relationship'  =>  'mother'

            ],
            [
                'id_children'   =>  6,
                'id_parent'     =>  2,
                'relationship'  =>  'mother'

            ],
            [
                'id_children'   =>  7,
                'id_parent'     =>  3,
                'relationship'  =>  'mother'

            ],
            [
               
                'id_children'   =>  8,
                'id_parent'     =>  4,
                'relationship'  =>  'mother'

            ],
            [
                'id_children'   =>  9,
                'id_parent'     =>  6,
                'relationship'  =>  'mother'

            ],
            [
                'id_children'   =>  10,
                'id_parent'     =>  5,
                'relationship'  =>  'mother'

            ],
        ]);
    }
}
