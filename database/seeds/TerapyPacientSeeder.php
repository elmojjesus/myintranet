<?php

use Illuminate\Database\Seeder;

class TerapyPacientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\Therapy::truncate();

        $terapies = [];
        foreach (rand(0, 10) as $key => $value) {
    		$terapies[] = [
    			'name' => 'Terapia ' . $value
    		];
        }

        \App\Therapy::insert($terapies);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
