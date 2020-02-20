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
                'sick'          =>  '',
                'growth'        =>  '',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  '',
                'incident'      =>  '',
                'blood_group'   =>  '',
                'clip_board'         =>  '',
                'growth_head_circumference'      =>  1,
            ],
            [
                'id'            =>  2,
                'id_children'   =>  2,
                'growth'        =>  '',
                'sick'          =>  '',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  '',
                'incident'      =>  '',
                'blood_group'   =>  '',
                'clip_board'         =>  '',
                'growth_head_circumference'      =>  1,
            ],
            [
                'id'            =>  3,
                'id_children'   =>  3,
                'growth'        =>  '',
                'sick'          =>  '',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  '',
                'incident'      =>  '',
                'blood_group'   =>  '',
                'clip_board'         =>  '',
                'growth_head_circumference'      =>  1,
            ],
            [
                'id'            =>  4,
                'id_children'   =>  4,
                'growth'        =>  '',
                'sick'          =>  '',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  '',
                'incident'      =>  '',
                'blood_group'   =>  '',
                'clip_board'         =>  '',
                'growth_head_circumference'      =>  1,
            ],
            [
                'id'            =>  5,
                'id_children'   =>  5,
                'growth'        =>  '',
                'sick'          =>  '',
                'growth_height' =>  1.2,
                'growth_weight' =>  0.5,
                'medicine'      =>  '',
                'incident'      =>  '',
                'blood_group'   =>  '',
                'clip_board'         =>  '',
                'growth_head_circumference'      =>  1,
            ],
        ]);
    }
}
