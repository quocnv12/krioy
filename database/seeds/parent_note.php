<?php

use Illuminate\Database\Seeder;

class parent_note extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_note')->delete();
        DB::table('parent_note')->insert([
            ['id' => '1', 'title' => 'Food', 'content' => 'Con tôi bị dị ứng canh cua','create_at'=>now()],
            ['id' => '2', 'title' => 'Food', 'content' => 'Ok anh chị','create_at'=>now()],

            ['id' => '3', 'title' => 'Leave', 'content' => 'alo','create_at'=>now()],
            ['id' => '4', 'title' => 'Leave', 'content' => 'blo','create_at'=>now()],
        ]);
    }
}
