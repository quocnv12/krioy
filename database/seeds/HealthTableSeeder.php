<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HealthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('health')->delete();
        DB::table('health')->insert([
            [
                'id'            =>  1,
                'id_children'   =>  1,

                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  '',
                'file_pdf'      =>  '',
            ],
            [
                'id'            =>  2,
                'id_children'   =>  2,

                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  '',
                'file_pdf'      =>  '',
            ],
            [
                'id'            =>  3,
                'id_children'   =>  3,

                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  '',
                'file_pdf'      =>  '',
            ],
            [
                'id'            =>  4,
                'id_children'   =>  4,

                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  '',
                'file_pdf'      =>  '',
            ],
            [
                'id'            =>  5,
                'id_children'   =>  5,

                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  '',
                'file_pdf'      =>  '',
            ],
        ]);
    }
}
