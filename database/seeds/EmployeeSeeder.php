<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	\App\Employee::truncate();
        $users = \App\User::all();
        $departaments = \App\Departament::all();
        $status = \App\Status::all();
        $employees = [];
        foreach($departaments as $departament) {
        	$employees[] = [
        		'user_id' => $users->random(1)->id,
        		'departament_id' => $departament->id,
                'status_id' => $status->random(1)->id
        	];
        }

        \App\Employee::insert($employees);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
