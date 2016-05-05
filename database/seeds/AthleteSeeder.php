<?php

use Illuminate\Database\Seeder;

class AthleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\Athlete::truncate();
       	$users = \App\User::all();
        $status = \App\Status::all();

       	$athletes = [];
       	foreach(range(0, 10) as $value) {
       		$athletes[] = [
       			'user_id' => $users->random(1)->id,
            'status_id' => $status->random(1)->id,
       		];
       	}
       	
       	\App\Athlete::insert($athletes);


        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
