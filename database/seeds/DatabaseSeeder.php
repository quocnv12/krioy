<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(ChildrenProfilesTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(StaffProfilesTableSeeder::class);
        $this->call(ParentProfilesTableSeeder::class);
        $this->call(ChildrenProgramTableSeeder::class);
        $this->call(ChildrenStaffTableSeeder::class);
        $this->call(ChildrenParentTableSeeder::class);
        $this->call(ObservationsTypeTableSeeder::class);
        $this->call(ObservationsTableSeeder::class);
        $this->call(StaffProgramsTableSeeder::class);
        $this->call(AttendanceChildrenTableSeeder::class);
        $this->call(AttendanceStaffTableSeeder::class);
        $this->call(FoodItemsTableSeeder::class);
       
       // $this->call(ChildrenFoodTableSeeder::class);
        $this->call(HealthTableSeeder::class);
        $this->call(NoticeBoardTableSeeder::class);
        $this->call(ProgramsNoticeTableSeeder::class);
        $this->call(role::class);
        $this->call(staff_role::class);
        $this->call(mealtype::class);
        $this->call(quantityfood::class);
        $this->call(FoodTableSeeder::class);
        $this->call(Food_Fooditem::class);
        $this->call(Permission::class);
        $this->call(PermissionRole::class);
        $this->call(ChildrenStatusTable::class);
    }
}
