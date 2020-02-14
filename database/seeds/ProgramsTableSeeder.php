<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('programs')->delete();
        DB::table('programs')->insert([
                [
                    'id'            => 1,
                    'program_name'  => 'Mẫu Giáo Bé',
                    'from_month'    => '9',
                    'to_month'      => '5',
                    'from_year'     => '2020',
                    'to_year'       => '2021',
                    'start_time'    => '',
                    'finish_time'   => '',
                    'schedule'      => '2,3,4,5,6',
                    'program_fee'   => '10000000',
                    'currency'      => 'VND',
                    'period_fee'    => '/month',
                    'status'        => '1',
                ],
                [
                    'id'            => 2,
                    'program_name'  => 'Mẫu Giáo Nhỡ',
                    'from_month'    => '9',
                    'to_month'      => '5',
                    'from_year'     => '2020',
                    'to_year'       => '2021',
                    'start_time'    => '',
                    'finish_time'   => '',
                    'schedule'      => '2,3,4,5,6',
                    'program_fee'   => '12000000',
                    'currency'      => 'VND',
                    'period_fee'   => '/month',
                    'status'        => '1',
                ],
                [
                    'id'            => 3,
                    'program_name'  => 'Mẫu Giáo Lớn',
                    'from_month'    => '9',
                    'to_month'      => '5',
                    'from_year'     => '2020',
                    'to_year'       => '2021',
                    'start_time'    => '',
                    'finish_time'   => '',
                    'schedule'      => '2,3,4,5,6',
                    'program_fee'   => '120000000',
                    'currency'      => 'VND',
                    'period_fee'   => '/month',
                    'status'        => '1',
                ],
                [
                    'id'            => 4,
                    'program_name'  => 'Mỹ Thuật Cơ Bản',
                    'from_month'    => '8',
                    'to_month'      => '10',
                    'from_year'     => '2020',
                    'to_year'       => '2021',
                    'start_time'    => '',
                    'finish_time'   => '',
                    'schedule'      => '2,3,4',
                    'program_fee'   => '120000000',
                    'currency'      => 'VND',
                    'period_fee'   => '/month',
                    'status'        => '1',
                ],
                [
                    'id'            => 5,
                    'program_name'  => 'Toán Nâng Cao',
                    'from_month'    => '8',
                    'to_month'      => '10',
                    'from_year'     => '2020',
                    'to_year'       => '2021',
                    'start_time'    => '',
                    'finish_time'   => '',
                    'schedule'      => '2,3,4',
                    'program_fee'   => '120000000',
                    'currency'      => 'VND',
                    'period_fee'   => '/month',
                    'status'        => '1',
                ],
                [
                    'id'            => 6,
                    'program_name'  => 'Năng khiếu múa',
                    'from_month'    => '8',
                    'to_month'      => '10',
                    'from_year'     => '2020',
                    'to_year'       => '2021',
                    'start_time'    => '',
                    'finish_time'   => '',
                    'schedule'      => '2,3,4',
                    'program_fee'   => '120000000',
                    'currency'      => 'VND',
                    'period_fee'   => '/month',
                    'status'        => '1',
                ],
                [
                    'id'            => 7,
                    'program_name'  => 'Năng khiếu Bóng Đá',
                    'from_month'    => '8',
                    'to_month'      => '10',
                    'from_year'     => '2020',
                    'to_year'       => '2021',
                    'start_time'    => '',
                    'finish_time'   => '',
                    'schedule'      => '2,3,4',
                    'program_fee'   => '120000000',
                    'currency'      => 'VND',
                    'period_fee'   => '/month',
                    'status'        => '1',
                ],
        ]);
    }
}
