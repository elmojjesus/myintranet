<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = \App\User::all();
        $cities = \App\City::all();
        $regionais = [
            'Bacacheri',
            'Centro',
            'Sul',
            'Norte',
            'Leste',
            'Oeste',
            'Capivara',
            'República'
        ];
        $data = [];
        foreach($users as $user){
        	$data[] = [
        		'street' => $faker->streetSuffix . $faker->streetAddress,
	        	'number' => $faker->buildingNumber,
	        	'complement' => $faker->secondaryAddress,
	        	'zip_code' => $faker->postcode,
	        	'neighborhood' => $faker->cityPrefix,
	        	'city_id' => $cities->random(1)->id,
	        	'regional' => $regionais[$faker->numberBetween(0, count($regionais) -1 )],
	        	'user_id' => $user->id,
        	];
        }
        \App\Address::insert($data);
    }
}
