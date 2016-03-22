<?php

use Illuminate\Database\Seeder;

class AthleteSportSeeder extends Seeder
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
        $sports = \App\Sport::all();
        $athletes = \App\Athlete::all();
        $status = \App\Status::all();

        $athleteSport = [];
        foreach(range(0, 20) as $value) {
        	$athleteSport[] = [
        		'athlete_id' => $athletes->random(1)->id,
	        	'sport_id' => $sports->random(1)->id,
	        	'status_id' => $status->random(1)->id,
        	];
        }

        \App\AthleteSport::insert($athleteSport);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
