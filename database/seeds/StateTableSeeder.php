<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1, 15) as $index) {
        	DB::table('states')->insert([
        		'name' => $faker->state,
        	]);
        }
    }
}
