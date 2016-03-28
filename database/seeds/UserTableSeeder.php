<?php

use Illuminate\Database\Seeder;
// use Faker\Factory;

class UserTableSeeder extends Seeder
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
        \App\User::truncate();
        $users = [];
        $deficiencies = \App\Deficiency::all();
        $educations = \App\Education::all();
        $professions = \App\Profession::all();
        $status = \App\Status::all();
        $users[] = [
            'email' => 'elmo@mail.com',
            'password' => bcrypt('123456'),
            'name' => 'Elmo',
            'deficiency_id' => $deficiencies->random(1)->id,
            'education_id' => $educations->random(1)->id,
            'profession_id' => $professions->random(1)->id,
            'mother' => $faker->firstNameFemale, 
            'father' => $faker->firstNameMale,
            'voluntary' => $faker->boolean(50),
            'status_id' => 1,
        ];
        foreach (range(0, 30) as $number) {
            $users[] = [
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'name' => $faker->name,
                'deficiency_id' => $deficiencies->random(1)->id,
                'education_id' => $educations->random(1)->id,
                'profession_id' => $professions->random(1)->id,
                'mother' => $faker->firstNameFemale, 
                'father' => $faker->firstNameMale,
                'voluntary' => $faker->boolean(50),
                'status_id' => $status->random(1)->id,
            ];
        }
        
        \App\User::insert($users);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}