<?php

use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
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
       	$sports = [
       		[
       			'name' => 'Basquete',
       		],
       		[
       			'name' => 'Volei',
       		],
       		[
       			'name' => 'Futebol',
       		],
       		[
       			'name' => 'Canoagem',
       		],
       		[
       			'name' => 'Tênis de mesa',
       		],
       		[
       			'name' => 'Bets',
       		],
       		[
       			'name' => 'Pipa',
       		],
       	];
       	
       	
       	\App\Sport::insert($sports);


        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
