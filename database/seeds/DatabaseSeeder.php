<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('StatusSeeder');

        $this->call('DeficiencySeeder');

        $this->call('EducationSeeder');

        $this->call('ProfessionSeeder');

        $this->call('UserTableSeeder');

        $this->call('AthleteSeeder');

        $this->call('SportSeeder');  

        $this->call('AthleteSportSeeder');      

        Model::reguard();
    }
}
