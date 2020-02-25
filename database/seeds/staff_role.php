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
        DB::table('staff_roles')->delete();
        DB::table('staff_roles')->insert([
            ['id_staff'=>1,'id_role'=>1],
            ['id_staff'=>2,'id_role'=>1],
            ['id_staff'=>3,'id_role'=>2],

            ['id_staff'=>4,'id_role'=>3],
            ['id_staff'=>4,'id_role'=>4],
         
            ['id_staff'=>5,'id_role'=>4],
            ['id_staff'=>5,'id_role'=>2],
          
            ['id_staff'=>6,'id_role'=>3],
            ['id_staff'=>6,'id_role'=>4],
            ['id_staff'=>6,'id_role'=>5],

            ['id_staff'=>7,'id_role'=>1],
            ['id_staff'=>8,'id_role'=>1],
            ['id_staff'=>9,'id_role'=>1],
            ['id_staff'=>10,'id_role'=>1],
            ['id_staff'=>11,'id_role'=>1],
            ['id_staff'=>12,'id_role'=>1],
            ['id_staff'=>13,'id_role'=>1],
            ['id_staff'=>14,'id_role'=>1],
            ['id_staff'=>15,'id_role'=>1],
            ['id_staff'=>16,'id_role'=>1],
            ['id_staff'=>17,'id_role'=>1],
            ['id_staff'=>18,'id_role'=>1],
            ['id_staff'=>19,'id_role'=>1],
            ['id_staff'=>20,'id_role'=>1],

        ]);
    }

}
