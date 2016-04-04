<?php

use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
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
        \App\Profession::truncate();
        $professions = [];
        foreach (range(1, 6) as $number) {
        	$professions[] = [
        		'name' => 'Profissão '. $number,
        	];
        }

        \App\Profession::insert($professions);

		DB::statement('SET FOREIGN_KEY_CHECKS = 1'); 
    }
}
