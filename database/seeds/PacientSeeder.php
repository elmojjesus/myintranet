<?php

use Illuminate\Database\Seeder;

class PacientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $users = \App\User::all();
        $data = [];
        foreach (range(0, 10) as $value) {
        	$id = $users->random(1)->id;
        	if (is_null(\App\Pacient::find($id))) {
	        	$data[] = [
	        		'user_id' => $id,
	        	];
        	}
        }

        \App\Pacient::insert($data);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
