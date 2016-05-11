<?php

use Illuminate\Database\Seeder;

class RegionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	\App\Regional::truncate();

    	$regionais = [
	        [
	        	'name' => 'Bairro Novo',
        	],
			[
				'name' => 'Boa Vista',
			],
			[
				'name' => 'Boqueirão',
			],
			[
				'name' => 'Cajuru',
			],
			[
				'name' => 'CIC',
			],
			[
				'name' => 'Fazendinha/Portão',
			],
			[
				'name' => 'Matriz',
			],
			[
				'name' => 'Pinheirinho',
			],
			[
				'name' => 'Santa Felicidade',
			],
			[
				'name' => 'Tatuquara',
			]
		];
		\App\Regional::insert($regionais);
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
