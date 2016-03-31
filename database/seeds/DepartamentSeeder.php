<?php

use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
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
        \App\Departament::truncate();
        $users = \App\User::all();
        $departaments = [];
        foreach (range(1, 6) as $number) {
        	$departaments[] = [
        		'name' => 'Departamento '. $number,
                'user_id' => $users->random(1)->id,
        	];
        }

        \App\Departament::insert($departaments);

		DB::statement('SET FOREIGN_KEY_CHECKS = 1'); 
    }
}
