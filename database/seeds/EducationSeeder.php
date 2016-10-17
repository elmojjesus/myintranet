<?php

use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
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
        \App\Education::truncate();
        /*
        $educations = [];
        foreach (range(1, 6) as $number) {
        	$educations[] = [
        		'name' => 'Educação '. $number,
        	];
        }
        */
        \App\Education::insert(['name' => 'Escolaridade indefinida']);

		DB::statement('SET FOREIGN_KEY_CHECKS = 1'); 
    }
}
