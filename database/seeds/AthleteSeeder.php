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
       	$users = \App\User::all();
       	$athletes = [];
       	foreach(range(0, 199) as $value) {
       		$athletes[] = [
       			'user_id' => $users->random(1)->id,
       		];
       	}
       	
       	\App\Athlete::insert($athletes);


        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
