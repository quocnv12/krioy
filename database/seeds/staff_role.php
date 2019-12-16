<?php

use Illuminate\Database\Seeder;

class staff_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_role')->delete();
        DB::table('staff_role')->insert([
           ['id_staff'=>1,'id_role'=>41],
           ['id_staff'=>2,'id_role'=>42],
           ['id_staff'=>3,'id_role'=>43],
           ['id_staff'=>4,'id_role'=>2],
           ['id_staff'=>4,'id_role'=>3],
           ['id_staff'=>4,'id_role'=>4],
           ['id_staff'=>4,'id_role'=>5],
           ['id_staff'=>4,'id_role'=>7],

           ['id_staff'=>5,'id_role'=>8],
           ['id_staff'=>5,'id_role'=>9],
           ['id_staff'=>5,'id_role'=>10],
           ['id_staff'=>5,'id_role'=>11],
           ['id_staff'=>5,'id_role'=>12],
           ['id_staff'=>5,'id_role'=>13],

          
        ]); 
    }
}
