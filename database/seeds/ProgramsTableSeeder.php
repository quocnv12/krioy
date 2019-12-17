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
        DB::table('programs')->insert([
                [
                    'id'            => 1,
                    'program_name'  => 'Kindergarten',
                    'from_month'    => '2012-12-12',
                    'to_month'      => '2013-12-12',
                    'from_year'     => '2012',
                    'to_year'       => '2013',
                    'period'        => '10',
                    'start_time'    => '10:00:00',
                    'finish_time'   => '17:00:00',
                    'schedule'      => '2,3,4',
                    'program_fee'   => '120000000',
                    'status'        => '1',
                ],
                [
                    'id'            => 2,
                    'program_name'  => 'Primary 1',
                    'from_month'    => '2012-12-12',
                    'to_month'      => '2013-12-12',
                    'from_year'     => '2012',
                    'to_year'       => '2013',
                    'period'        => '8',
                    'start_time'    => '11:00:00',
                    'finish_time'   => '18:00:00',
                    'schedule'      => '2,3,4,5,6',
                    'program_fee'   => '10000000',
                    'status'        => '1',
                ],
                [
                    'id'            => 3,
                    'program_name'  => 'Primary 2',
                    'from_month'    => '2012-12-12',
                    'to_month'      => '2013-12-12',
                    'from_year'     => '2012',
                    'to_year'       => '2013',
                    'period'        => '6',
                    'start_time'    => '10:00:00',
                    'finish_time'   => '17:00:00',
                    'schedule'      => '2,3,4,5,6,7,8',
                    'program_fee'   => '120000000',
                    'status'        => '1',
                ],
                [
                    'id'            => 4,
                    'program_name'  => 'Secondary',
                    'from_month'    => '2012-10-12',
                    'to_month'      => '2013-10-12',
                    'from_year'     => '2012',
                    'to_year'       => '2013',
                    'period'        => '10',
                    'start_time'    => '10:00:00',
                    'finish_time'   => '17:00:00',
                    'schedule'      => '2,3,4',
                    'program_fee'   => '120000000',
                    'status'        => '1',
                ],
                [
                    'id'            => 5,
                    'program_name'  => 'University',
                    'from_month'    => '2012-12-12',
                    'to_month'      => '2013-12-12',
                    'from_year'     => '2012',
                    'to_year'       => '2013',
                    'period'        => '10',
                    'start_time'    => '10:00:00',
                    'finish_time'   => '17:00:00',
                    'schedule'      => '2,3,4',
                    'program_fee'   => '120000000',
                    'status'        => '1',
                ],
        ]);
    }
}
