<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('parent_profiles')->delete();
        DB::table('parent_profiles')->insert([
            [
                'id'            =>  1,
                'first_name'    =>  'jerry',
                'last_name'     =>  'laura',
                'gender'        =>  1,
                'email'         =>  'laura@gmail.com',
                'note'          =>  '',
                'phone'         =>  '0971123123',
                'image'         =>  ''
            ],
            [
                'id'            =>  2,
                'first_name'    =>  'thomas',
                'last_name'     =>  'see',
                'gender'        =>  0,
                'email'         =>  'see@gmail.com',
                'note'          =>  '',
                'phone'         =>  '0987123123',
                'image'         =>  ''
            ],
            [
                'id'            =>  3,
                'first_name'    =>  'tim',
                'last_name'     =>  'shen',
                'gender'        =>  1,
                'email'         =>  'shen@gmail.com',
                'note'          =>  '',
                'phone'         =>  '0345678123',
                'image'         =>  ''
            ],
            [
                'id'            =>  4,
                'first_name'    =>  'heel',
                'last_name'     =>  'dawn',
                'gender'        =>  1,
                'email'         =>  'dawn@gmail.com',
                'note'          =>  '',
                'phone'         =>  '0981234234',
                'image'         =>  ''
            ],
            [
                'id'            =>  5,
                'first_name'    =>  'robert',
                'last_name'     =>  'chen',
                'gender'        =>  1,
                'email'         =>  'chen@gmail.com',
                'note'          =>  '',
                'phone'         =>  '0989222888',
                'image'         =>  ''
            ],
            [
                'id'            =>  6,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  '',
                'phone'         =>  '0981234567',
                'image'         =>  ''
            ],
        ]);
    }
}
