<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	\App\Status::truncate();
        $data = [
        	[
        		'name' => 'Ativo',
        	],
        	[
        		'name' => 'Inativo',
        	],
        	[
        		'name' => 'Pendente',
        	],
        	[
        		'name' => 'Em espera',
        	],
        	[
        		'name' => 'Temporário',
        	],
        ];
        \App\Status::insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
