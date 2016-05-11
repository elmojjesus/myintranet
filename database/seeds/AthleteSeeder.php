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
<<<<<<< HEAD

=======
>>>>>>> 3a2d3fb98947c970d0b2f2126a441025a571f146
       	$athletes = [];
       	foreach(range(0, 199) as $value) {
       		$athletes[] = [
       			'user_id' => $users->random(1)->id,
            'status_id' => $status->random(1)->id,
       		];
       	}
       	
       	\App\Athlete::insert($athletes);


        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
