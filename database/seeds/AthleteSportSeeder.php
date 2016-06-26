<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AthleteSportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        $sports = \App\Sport::count();
        $athletes = \App\Athlete::all();
        
        \App\AthleteSport::truncate();

        foreach($athletes as $athlete) {
            $faker = Faker::create();
            $num = $faker->numberBetween($min = 1, $sports);
            foreach (range(1, $num) as $index) {
            	$athleteSport = null;
                $athleteSport = [
            		'athlete_id' => $athlete->id,
    	        	'sport_id' => $faker->unique()->numberBetween($min = 1, $sports),
            	];
                \App\AthleteSport::insert($athleteSport);
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

#foreach(range(0, 3) as $value) {
#            $athleteSport[] = [
#                'athlete_id' => $athletes->random(1)->id,
#                'sport_id' => $sports->unique()->random(1)->id,
#            ];
#        }