<?php

use Illuminate\Database\Seeder;

class Permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission')->delete();
        DB::table('permission')->insert([
            ['id'=>'1','name'=>'Attendance'],
            ['id'=>'2','name'=>'Diary'],
            ['id'=>'3','name'=>'Food'],
            ['id'=>'4','name'=>'Star'],
            ['id'=>'5','name'=>'Potty'],
            ['id'=>'6','name'=>'Health'],
            ['id'=>'7','name'=>'Observations'],
            ['id'=>'8','name'=>'Photos'],
            ['id'=>'9','name'=>'Play and learn'],
            ['id'=>'10','name'=>'Sleep'],
            ['id'=>'11','name'=>'Noticeboard'],
            ['id'=>'12','name'=>'Calendar'],
            ['id'=>'13','name'=>'Parent notes'],
            ['id'=>'14','name'=>'Router tracker'],
            ['id'=>'15','name'=>'Reports'],
            ['id'=>'16','name'=>'Daily reports'],
            ['id'=>'17','name'=>'History'],
            ['id'=>'18','name'=>'Enquiries'],
            ['id'=>'19','name'=>'Invoices'],
            ['id'=>'20','name'=>'Expenses'],
            ['id'=>'21','name'=>'Children profiles'],
            ['id'=>'22','name'=>'Staff profiles'],
            ['id'=>'23','name'=>'Programs'],
            ['id'=>'24','name'=>'School'],
            ['id'=>'25','name'=>'Archives'],
            ['id'=>'26','name'=>'Room ratio'],
            ['id'=>'27','name'=>'Favourite'],
            ['id'=>'28','name'=>'Tags'],
            ['id'=>'29','name'=>'Transaport setup'],
            ['id'=>'30','name'=>'Qr download'],
            ['id'=>'31','name'=>'Allergies info'],
            ['id'=>'32','name'=>'Invite parents'],
            ['id'=>'33','name'=>'Invite staff'],
            ['id'=>'34','name'=>'Cctvaccess'],
            ['id'=>'35','name'=>'Configuratios'],
            ['id'=>'36','name'=>'Shop'],
            ['id'=>'37','name'=>'Game'],
            ['id'=>'38','name'=>'Ebook blog'],
            ['id'=>'39','name'=>'Courses'],
            ['id'=>'40','name'=>'Video'],
            ['id'=>'41','name'=>'Audio book'],
            ['id'=>'42','name'=>'FAQs'],
            ['id'=>'43','name'=>'Help videos'],
            ['id'=>'44','name'=>'Role'],
        ]);
    }
}
