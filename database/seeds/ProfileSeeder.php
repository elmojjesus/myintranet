<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\Profile::truncate();
        $users = \App\User::where('id', '>', 1)->limit(10)->orderBy('name')->get();
        $roles = \App\Role::where('id', '>', 1)->get();
        $profiles = [];
        $profiles[] = [
        	'user_id' => 1,
        	'role_id' => 1
        ];
        foreach($users as $user) {
        	$profiles[] = [
        		'user_id' => $user->id,
        		'role_id' => $roles->random(1)->id
        	];
        }
        \App\Profile::insert($profiles);
    }
}
