<?php

use Illuminate\Database\Seeder;

class staff_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_roles')->delete();
        DB::table('staff_roles')->insert([
            ['id_staff'=>1,'id_role'=>1],
            ['id_staff'=>2,'id_role'=>1],
            ['id_staff'=>3,'id_role'=>2],

            ['id_staff'=>4,'id_role'=>3],
            ['id_staff'=>4,'id_role'=>4],
         
            ['id_staff'=>5,'id_role'=>4],
            ['id_staff'=>5,'id_role'=>2],
          
            ['id_staff'=>6,'id_role'=>3],
            ['id_staff'=>6,'id_role'=>4],
            ['id_staff'=>6,'id_role'=>5],

        ]);
    }


    // public function __construct()
    // {
    //     $this->role = [
    //         'collaborator' => 1,
    //         'admin' => 2
    //     ];
    // }
    // public function only($options)
    // {
    //     $permission = Auth::user()->level;
    //     //dd($this->role[$options]);
    //     if($permission == $this->role[$options]){
    //         return 1;
    //     }
    //     else{
    //         return 0;
    //     }
    //     //return in_array(array_search($permission,$this->role),array_wrap($options)) ? 1 : 0;
    // }
    // public function except($options)
    // {
    //     $permission = Auth::user()->level;
    //     if($permission == $this->role[$options]){
    //         return 0;
    //     }
    //     else{
    //         return 1;
    //     }
    // }
    // public function all()
    // {
    //     return TRUE;
    // }

    // /**
    //  * Register any authentication / authorization services.
    //  *
    //  * @return void
    //  */
    // public function boot()
    // {
    //     $this->registerPolicies();
    //     /*
    //      * Admin - Manager account
    //      */
    //     Gate::define('admin',function($user){
    //         return $this->only('admin');
    //     });
    //     Gate::define('collaborator', function($user){
    //        return $this->except('collaborator');
    //     });
    // }
}
