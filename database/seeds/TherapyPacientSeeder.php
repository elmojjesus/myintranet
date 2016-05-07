<?php

use Illuminate\Database\Seeder;

class TherapyPacientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \App\PacientTherapy::truncate();

        $therapies = \App\Therapy::all();
        $pacients = \App\Pacient::all();
        $status = \App\Status::all();
        $pacientTherapy = [];
        $i = 0;
        while($i < 20) {
            $pacientTherapy[] = [
                'therapy_id' => $therapies->random(1)->id,
                'pacient_id' => $pacients->random(1)->id,
                'status_id' => $status->random(1)->id
            ];
            $i++;
        }

        \App\PacientTherapy::insert($pacientTherapy);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
