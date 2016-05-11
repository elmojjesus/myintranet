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
        \App\Pacient::truncate();
        $users = \App\User::all();
        $status = \App\Status::all();
        $data = [];
        $ids = [];
        foreach (range(0, 10) as $value) {
        	$id = $users->random(1)->id;
            if (!isset($ids[$id])) {
                $data[] = [
                    'user_id' => $id,
                    'status_id' => $status->random(1)->id
                ];
                $ids[$id] = $id;
            }
        }

        \App\Pacient::insert($data);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
