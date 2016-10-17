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
        $regionais = \App\Regional::all();
        $status = \App\Status::all();
        $sex = [0 => 'M', 1 => 'F'];
        $now = new \Datetime();
        $default[] = [
            'email' => 'mail@mail.com',
            'password' => bcrypt('mail'),
            'name' => 'Default User',
            'deficiency_id' => $deficiencies->random(1)->id,
            'education_id' => $educations->random(1)->id,
            'profession_id' => $professions->random(1)->id,
            'mother' => $faker->firstNameFemale, 
            'father' => $faker->firstNameMale,
            'voluntary' => 0,
            'sex' => 'M',
            'status_id' => 1,
            'regional_id' => $regionais->random(1)->id,
            'initial_registry' => $now->format('Y-m-d H:i:s')
        ];
        
        \App\User::insert($default);
        
        /*
        foreach (range(0, 100) as $number) {            
           $id = DB::table('users')->insertGetId([
                'email' => $faker->email,
                'name' => $faker->name,
                'nationality' => 'Brasileiro',
                'entry_port' => 'Entrada',
                'birthDate' => '2000-05-01 12:21:12',
                'deficiency_id' => $deficiencies->random(1)->id,
                'education_id' => $educations->random(1)->id,
                'profession_id' => $professions->random(1)->id,
                'mother' => $faker->firstNameFemale, 
                'father' => $faker->firstNameMale,
                'voluntary' => 0,
                'sex' => $sex[$faker->numberBetween($min = 0, $max = 1)],
                'status_id' => $status->random(1)->id,
                'regional_id' => $regionais->random(1)->id,
                'created_at' => $now->format('Y-m-d H:i:s'),
                'initial_registry' => $now->format('Y-m-d H:i:s')
            ]);
            
            DB::table('documents')->insert([
                'cpf' => '06693017959',
                'rg' => '363620862',
                'user_id' => $id
            ]);
           
        }
        */
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
