<?php

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
        $users = \App\User::all();
        $data = [];
        foreach($users as $user) {
        	$data[] = [
        		'rg' => $faker->numberBetween(10, 99) . '.' . $faker->numberBetween(100, 999) . '.' . $faker->numberBetween(100, 999) . '-' . $faker->numberBetween(1, 9),
        		'cpf' => $faker->numberBetween(100, 999) . '.' . $faker->numberBetween(100, 999) . '.' . $faker->numberBetween(100, 999) . '-' . $faker->numberBetween(10, 99),
        		'user_id' => $user->id,
        	];
        }
        \App\Document::insert($data);
    }
}
