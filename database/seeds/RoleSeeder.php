<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\Role::truncate();
        $data = [
        	[
        		'name' => "Diretor"
        	],
        	[
        		'name' => "Usuário"
        	]
        ];
        \App\Role::insert($data);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
