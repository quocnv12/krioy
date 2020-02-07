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
            	'in'    =>'2020-01-01 16:52:33',
            	'out'    =>'',
            	'absent'    =>'',
            	'status'    =>'1',
            	'id_children'    =>'1',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'2',
            	'in'    =>'',
            	'out'    =>'2020-01-01 16:52:33',
            	'absent'    =>'',
            	'status'    =>'2',
            	'id_children'    =>'2',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'3',
            	'in'    =>'',
            	'out'    =>'',
            	'absent'    =>'2020-01-01 16:52:33',
            	'status'    =>'3',
            	'id_children'    =>'3',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'4',
            	'in'    =>'2020-01-01 16:52:33',
            	'out'    =>'',
            	'absent'    =>'',
            	'status'    =>'1',
            	'id_children'    =>'4',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'5',
            	'in'    =>'',
            	'out'    =>'2020-01-01 16:52:33',
            	'absent'    =>'',
            	'status'    =>'2',
            	'id_children'    =>'5',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'6',
            	'in'    =>'',
            	'out'    =>'',
            	'absent'    =>'2020-01-01 16:52:33',
            	'status'    =>'3',
            	'id_children'    =>'6',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'7',
            	'in'    =>'2020-01-01 16:52:33',
            	'out'    =>'',
            	'absent'    =>'',
            	'status'    =>'1',
            	'id_children'    =>'7',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'8',
            	'in'    =>'',
            	'out'    =>'2020-01-01 16:52:33',
            	'absent'    =>'',
            	'status'    =>'2',
            	'id_children'    =>'8',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'9',
            	'in'    =>'',
            	'out'    =>'',
            	'absent'    =>'2020-01-01 16:52:33',
            	'status'    =>'3',
            	'id_children'    =>'9',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
            [	
            	'id' =>'10',
            	'in'    =>'2020-01-01 16:52:33',
            	'out'    =>'',
            	'absent'    =>'',
            	'status'    =>'1',
            	'id_children'    =>'10',
                'created_at'    =>'2020-01-01 16:52:33',
                'updated_at'    =>'2020-01-01 16:52:33',
            ],
        ]);
    }
}
