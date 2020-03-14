<?php

use Illuminate\Database\Seeder;

class ParentNoteContent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_note_content')->delete();
        DB::table('parent_note_content')->insert([
            ['id' => '1', 'content' => 'Con tôi bị dị ứng tôm', 'id_parent_note' => 1, 'id_parent' => 1],
            ['id' => '2', 'content' => 'Bạn ấy còn dị ứng thực phẩm gì nữa không', 'id_parent_note' => 1, 'id_staff' => 1],
            ['id' => '3', 'content' => 'Không', 'id_parent_note' => 1, 'id_parent' => 1],


            ['id' => '4', 'content' => 'Con tôi hôm nay có vấn đề gì không', 'id_parent_note' => 2, 'id_parent' => 1],
            ['id' => '5', 'content' => 'Không', 'id_parent_note' => 2, 'id_staff' => 2],
            
            ['id' => '6', 'content' => 'Hôm nay con tôi xin nghỉ', 'id_parent_note' => 3, 'id_parent' => 2],
            ['id' => '7', 'content' => 'Ok', 'id_parent_note' => 3, 'id_staff' => 1],

            ['id' => '8', 'content' => 'Hôm nay con tôi bị sốt không', 'id_parent_note' => 4, 'id_parent' => 1],
            ['id' => '9', 'content' => 'Không', 'id_parent_note' => 4, 'id_staff' => 1],

           
        ]);
    }
}
