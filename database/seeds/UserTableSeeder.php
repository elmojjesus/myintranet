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
        $users[] = [
            'email' => 'ueslei.lima@movasoft.com.br',
            'password' => bcrypt('123456'),
            'name' => 'Ueslei Lima'
        ];
        foreach (range(0, 30) as $number) {
            $users[] = [
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'name' => $faker->name
            ];
        }
        
        \App\User::insert($users);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
