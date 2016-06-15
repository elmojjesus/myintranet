<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $users = \App\User::all();
        $data = [];
        foreach ($users as $user) {
        	DB::table('contacts')->insert([
        		'homeNumber' => $faker->phoneNumber,
        		'mobileNumber' => $faker->phoneNumber,
        		'toMessageNumber' => $faker->phoneNumber,
        		'email' => $faker->email,
        		'user_id' => $user->id,
        	]);
        }
    }
}
