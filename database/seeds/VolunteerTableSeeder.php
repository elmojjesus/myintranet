<?php

use Illuminate\Database\Seeder;

class VolunteerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	\App\Volunteer::truncate();
        $users = \App\User::all();
        $departaments = \App\Departament::all();
        $status = \App\Status::all();
        $volunteers = [];
        foreach($departaments as $departament) {
        	$volunteers[] = [
        		'user_id' => $users->random(1)->id,
        		'departament_id' => $departament->id,
                'status_id' => $status->random(1)->id
        	];
        }

        \App\Volunteer::insert($volunteers);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
