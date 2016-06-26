<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AthleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $faker = Faker::create();
        
       	$users = \App\User::count();
        $status = \App\Status::count();

       	\App\Athlete::truncate();

       	foreach(range(0, 20) as $value) {
       		$athletes[] = [
       			'user_id' => $faker->unique()->numberBetween($min = 1, $max = $users),
            'status_id' => $faker->numberBetween($min = 1, $max = $status),
       		];
       	}
       	
       	\App\Athlete::insert($athletes);


        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
