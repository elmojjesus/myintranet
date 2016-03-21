<?php

use Illuminate\Database\Seeder;

class DeficiencySeeder extends Seeder
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
        \App\Deficiency::truncate();
        $deficiencies = [];
        foreach (range(1, 6) as $number) {
        	$deficiencies[] = [
        		'name' => 'Deficiência '. $number,
        	];
        }

        \App\Deficiency::insert($deficiencies);

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');        
    }
}
