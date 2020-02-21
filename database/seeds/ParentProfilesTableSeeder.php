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
                'note'          =>  'hi',
                'main_phone'         =>  '0971123123',
                'extra_phone'         =>  '0971123124',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  2,
                'first_name'    =>  'thomas',
                'last_name'     =>  'see',
                'gender'        =>  0,
                'email'         =>  'see@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '0971123125',
                'extra_phone'         =>  '0971123127',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  3,
                'first_name'    =>  'thomas',
                'last_name'     =>  'see',
                'gender'        =>  0,
                'email'         =>  'see@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '0971123125',
                'extra_phone'         =>  '0971123127',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  4,
                'first_name'    =>  'heel',
                'last_name'     =>  'dawn',
                'gender'        =>  1,
                'email'         =>  'dawn@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '0981234234',
                'extra_phone'         =>  '0981534234',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  5,
                'first_name'    =>  'robert',
                'last_name'     =>  'chen',
                'gender'        =>  1,
                'email'         =>  'chen@gmail.com',
                'note'          =>  'hi',

                'main_phone'         =>  '0989222888',
                'extra_phone'         =>  '0989122888',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  6,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '0981234567',
                'extra_phone'         =>  '0981934567',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  7,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '0981259567',
                'extra_phone'         =>  '0981234568',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  8,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  9,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  10,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  11,
                'first_name'    =>  'jerry',
                'last_name'     =>  'laura',
                'gender'        =>  1,
                'email'         =>  'laura@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '4815617651',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  12,
                'first_name'    =>  'thomas',
                'last_name'     =>  'see',
                'gender'        =>  0,
                'email'         =>  'see@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '645343',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  13,
                'first_name'    =>  'tim',
                'last_name'     =>  'shen',
                'gender'        =>  1,
                'email'         =>  'shen@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '324324325',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  14,
                'first_name'    =>  'heel',
                'last_name'     =>  'dawn',
                'gender'        =>  1,
                'email'         =>  'dawn@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '343535435',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  15,
                'first_name'    =>  'robert',
                'last_name'     =>  'chen',
                'gender'        =>  1,
                'email'         =>  'chen@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '3542353',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  16,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  17,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  18,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  19,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  20,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  21,
                'first_name'    =>  'jerry',
                'last_name'     =>  'laura',
                'gender'        =>  1,
                'email'         =>  'laura@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '4815617651',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')

            ],
            [
                'id'            =>  22,
                'first_name'    =>  'thomas',
                'last_name'     =>  'see',
                'gender'        =>  0,
                'email'         =>  'see@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '645343',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  23,
                'first_name'    =>  'tim',
                'last_name'     =>  'shen',
                'gender'        =>  1,
                'email'         =>  'shen@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '324324325',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  24,
                'first_name'    =>  'heel',
                'last_name'     =>  'dawn',
                'gender'        =>  1,
                'email'         =>  'dawn@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '343535435',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  25,
                'first_name'    =>  'robert',
                'last_name'     =>  'chen',
                'gender'        =>  1,
                'email'         =>  'chen@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '3542353',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  26,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  27,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  28,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  29,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  30,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  31,
                'first_name'    =>  'jerry',
                'last_name'     =>  'laura',
                'gender'        =>  1,
                'email'         =>  'laura@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '4815617651',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  32,
                'first_name'    =>  'thomas',
                'last_name'     =>  'see',
                'gender'        =>  0,
                'email'         =>  'see@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '645343',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  33,
                'first_name'    =>  'tim',
                'last_name'     =>  'shen',
                'gender'        =>  1,
                'email'         =>  'shen@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '324324325',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  34,
                'first_name'    =>  'heel',
                'last_name'     =>  'dawn',
                'gender'        =>  1,
                'email'         =>  'dawn@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '343535435',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  35,
                'first_name'    =>  'robert',
                'last_name'     =>  'chen',
                'gender'        =>  1,
                'email'         =>  'chen@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '3542353',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  36,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  37,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  38,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  39,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  40,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  41,
                'first_name'    =>  'jerry',
                'last_name'     =>  'laura',
                'gender'        =>  1,
                'email'         =>  'laura@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '4815617651',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  42,
                'first_name'    =>  'thomas',
                'last_name'     =>  'see',
                'gender'        =>  0,
                'email'         =>  'see@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '645343',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  43,
                'first_name'    =>  'tim',
                'last_name'     =>  'shen',
                'gender'        =>  1,
                'email'         =>  'shen@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '324324325',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  44,
                'first_name'    =>  'heel',
                'last_name'     =>  'dawn',
                'gender'        =>  1,
                'email'         =>  'dawn@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '343535435',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  45,
                'first_name'    =>  'robert',
                'last_name'     =>  'chen',
                'gender'        =>  1,
                'email'         =>  'chen@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '3542353',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  46,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  47,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  48,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  49,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
            [
                'id'            =>  50,
                'first_name'    =>  'word',
                'last_name'     =>  'example',
                'gender'        =>  1,
                'email'         =>  'example@gmail.com',
                'note'          =>  'hi',
                'main_phone'         =>  '98867543',
                'extra_phone'         =>  '4815617651',
                'image'         =>  '',
                'password'  =>  bcrypt('123456789')
            ],
        ]);
    }
}
