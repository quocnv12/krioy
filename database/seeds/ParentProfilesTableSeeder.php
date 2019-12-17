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
        DB::table('parent_profiles')->insert([
            [
                'id'            =>  1,
                'first_name'    =>  'jerry',
                'last_name'     =>  'laura',
                'gender'        =>  1,
                'email'         =>  'laura@gmail.com',
                'note'          =>  'son of the bitch',
                'phone'         =>  '4815617651',
                'image'         =>  'images'
            ],
            [
                'id'            =>  2,
                'first_name'    =>  'thomas',
                'last_name'     =>  'see',
                'gender'        =>  0,
                'email'         =>  'see@gmail.com',
                'note'          =>  'son of the bitch',
                'phone'         =>  '645343',
                'image'         =>  'images'
            ],
            [
                'id'            =>  3,
                'first_name'    =>  'tim',
                'last_name'     =>  'shen',
                'gender'        =>  1,
                'email'         =>  'shen@gmail.com',
                'note'          =>  'son of the bitch',
                'phone'         =>  '324324325',
                'image'         =>  'images'
            ],
            [
                'id'            =>  4,
                'first_name'    =>  'heel',
                'last_name'     =>  'dawn',
                'gender'        =>  1,
                'email'         =>  'dawn@gmail.com',
                'note'          =>  'son of the bitch',
                'phone'         =>  '343535435',
                'image'         =>  'images'
            ],
            [
                'id'            =>  5,
                'first_name'    =>  'robert',
                'last_name'     =>  'chen',
                'gender'        =>  1,
                'email'         =>  'chen@gmail.com',
                'note'          =>  'son of the bitch',
                'phone'         =>  '3542353',
                'image'         =>  'images'
            ],
            [
                'id'            =>  6,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'son of the bitch',
                'phone'         =>  '98867543',
                'image'         =>  'images'
            ],
        ]);
    }
}
