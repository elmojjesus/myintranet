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

        $this->call('DocumentSeeder');

        $this->call('AthleteSeeder');

        $this->call('SportSeeder');  

        $this->call('AthleteSportSeeder');    

        $this->call('DepartamentSeeder');  

        $this->call('EmployeeSeeder');

<<<<<<< HEAD
        $this->call('TerapiesSeeder');

        $this->call('PacientSeeder');
=======
        $this->call('StateTableSeeder');

        $this->call('CityTableSeeder');

        $this->call('AddressTableSeeder');
>>>>>>> e699eac0a1dbd995e58bce57da6fc6077a2d7cf3

        Model::reguard();
    }
}
