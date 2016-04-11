<?php

use Illuminate\Database\Seeder;

class TerapiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\Terapy::truncate();
        $data = [
        	[
        		'name' => 'Musicoterapia'
        	],
        	[
        		'name' => 'Terapia ocupacional'
        	],
        	[
        		'name' => 'Fisioterapia'
        	],
        	[
				'name' => 'Psicólogo'
        	],
        ];

        \App\Terapy::insert($data);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
