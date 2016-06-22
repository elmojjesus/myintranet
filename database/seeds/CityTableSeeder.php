<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $states = \App\State::all();
        foreach ($states as $state) {
        	DB::table('cities')->insert([
        		'state' => $state->id,
        		'name' => $faker->city,
        	]);
        }
    }
}
