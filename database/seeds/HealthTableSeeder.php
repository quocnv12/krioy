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
        DB::table('health')->insert([
            [
                'id_children'   =>  1,
                'time'          =>  '2012-10-10',
                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  'images',
                'file_pdf'      =>  'file pdf',
            ],
            [
                'id_children'   =>  2,
                'time'          =>  '2012-10-10',
                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  'images',
                'file_pdf'      =>  'file pdf',
            ],
            [
                'id_children'   =>  3,
                'time'          =>  '2012-10-10',
                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  'images',
                'file_pdf'      =>  'file pdf',
            ],
            [
                'id_children'   =>  4,
                'time'          =>  '2012-10-10',
                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  'images',
                'file_pdf'      =>  'file pdf',
            ],
            [
                'id_children'   =>  5,
                'time'          =>  '2012-10-10',
                'sick'          =>  'none',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  'none',
                'incident'      =>  'none',
                'blood_group'   =>  'A',
                'image'         =>  'images',
                'file_pdf'      =>  'file pdf',
            ],
        ]);
    }
}
