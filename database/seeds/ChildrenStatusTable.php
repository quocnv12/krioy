<?php

use Illuminate\Database\Seeder;

class ChildrenStatusTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('children_status')->delete();
        DB::table('children_status')->insert([
            [
            	'id' =>'1',
                'id_children'    =>'1',
                'id_program'    =>'1',
            	'in'    =>'2020-01-01 16:52:33',
            	'out'    =>null,
            	'absent'    =>null,
            	'status'    =>'1',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'2',
                'id_children'    =>'2',
                'id_program'    =>'2',
            	'in'    =>null,
            	'out'    =>'2020-01-01 16:52:33',
            	'absent'    =>null,
            	'status'    =>'2',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'3',
                'id_children'    =>'3',
                'id_program'    =>'3',
            	'in'    =>null,
            	'out'    =>null,
            	'absent'    =>'2020-01-01 16:52:33',
            	'status'    =>'3',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'4',
                'id_children'    =>'4',
                'id_program'    =>'4',
            	'in'    =>'2020-01-01 16:52:33',
            	'out'    =>null,
            	'absent'    =>null,
            	'status'    =>'1',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'5',
                'id_children'    =>'5',
                'id_program'    =>'5',
            	'in'    =>null,
            	'out'    =>'2020-01-01 16:52:33',
            	'absent'    =>null,
            	'status'    =>'2',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'6',
                'id_children'    =>'6',
                'id_program'    =>'1',
            	'in'    =>null,
            	'out'    =>null,
            	'absent'    =>'2020-01-01 16:52:33',
            	'status'    =>'3',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'7',
                'id_children'    =>'7',
                'id_program'    =>'2',
            	'in'    =>'2020-01-01 16:52:33',
            	'out'    =>null,
            	'absent'    =>null,
            	'status'    =>'1',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'8',
                'id_children'    =>'8',
                'id_program'    =>'3',
            	'in'    =>null,
            	'out'    =>'2020-01-01 16:52:33',
            	'absent'    =>null,
            	'status'    =>'2',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'9',
                'id_children'    =>'9',
                'id_program'    =>'4',
            	'in'    =>null,
            	'out'    =>null,
            	'absent'    =>'2020-01-01 16:52:33',
            	'status'    =>'3',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'10',
                'id_children'    =>'10',
                'id_program'    =>'5',
            	'in'    =>'2020-01-01 16:52:33',
            	'out'    =>null,
            	'absent'    =>null,
            	'status'    =>'1',
            	
                'active'    =>'0',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
        ]);
    }
}
