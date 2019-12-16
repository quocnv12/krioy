<?php

use Illuminate\Database\Seeder;

class role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->delete();
        DB::table('role')->insert([
           ['id'=>'1','name'=>'Attendance'],
           ['id'=>'2','name'=>'Call Parents'],
           ['id'=>'3','name'=>'Children Profiles'],
           ['id'=>'4','name'=>'Diary'],
           ['id'=>'5','name'=>'Expense Addition'],
           ['id'=>'6','name'=>'Food'],
           ['id'=>'7','name'=>'Notice Board'],
           ['id'=>'8','name'=>'Parent Access Status'],
           ['id'=>'9','name'=>'Play & Learn'],
           ['id'=>'10','name'=>'QR Check-In'],
           ['id'=>'11','name'=>'Reports'],
           ['id'=>'12','name'=>'SMS'],
           ['id'=>'13','name'=>'Star'],
           ['id'=>'14','name'=>'Video'],
           ['id'=>'15','name'=>'Billing & Receipts'],
           ['id'=>'16','name'=>'CCTV View'],
           ['id'=>'17','name'=>'Customised Staff Permissions'],
           ['id'=>'18','name'=>'Enquiries - New'],
           ['id'=>'19','name'=>'Expense Management'],
           ['id'=>'20','name'=>'Health'],
           ['id'=>'21','name'=>'Observations'],
           ['id'=>'22','name'=>'Parent Notes'],
           ['id'=>'23','name'=>'Potty'],
           ['id'=>'24','name'=>'QR Settings'],
           ['id'=>'25','name'=>'School Profile'],
           ['id'=>'26','name'=>'Staff Attendance'],
           ['id'=>'27','name'=>'Tag Settings'],
           ['id'=>'28','name'=>'Calendar'],
           ['id'=>'29','name'=>'Child Daily Report'],
           ['id'=>'30','name'=>'Delete a Post'],
           ['id'=>'31','name'=>'Enquiries Summary'],
           ['id'=>'32','name'=>'Fee Templates'],
           ['id'=>'33','name'=>'History'],
           ['id'=>'34','name'=>'Package Details'],
           ['id'=>'35','name'=>'Photos'],
           ['id'=>'36','name'=>'Programs'],
           ['id'=>'37','name'=>'Reminder Settings'],
           ['id'=>'38','name'=>'Sleep'],
           ['id'=>'39','name'=>'Staff Profiles'],
           ['id'=>'40','name'=>'Transport Tracking'],
           ['id'=>'41','name'=>'Principal'],
           ['id'=>'42','name'=>'Vice-President'],
           ['id'=>'43','name'=>'Ministry'],
        ]); 
    }
}
