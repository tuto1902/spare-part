<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Brand;
use App\Transmission;
use App\Fuel;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        
        // Seed all the car brand names
        $brands = [
            ['name' => 'Acura'],
            ['name' => 'Alfa Romeo'],
            ['name' => 'Aro'],
            ['name' => 'Asia'],
            ['name' => 'Aston Martin'],
            ['name' => 'Audi'],
            ['name' => 'Austin'],
            ['name' => 'Avanti'],
            ['name' => 'Bentley'],
            ['name' => 'Bluebird'],
            ['name' => 'BMW'],
            ['name' => 'BYD'],
            ['name' => 'Cadillac'],
            ['name' => 'Chery'],
            ['name' => 'Chevrolet'],
            ['name' => 'Chrysler'],
            ['name' => 'Citroen'],
            ['name' => 'Dacia'],
            ['name' => 'Daewoo'],
            ['name' => 'Daihatsu'],
            ['name' => 'Datsun'],
            ['name' => 'DFM'],
            ['name' => 'Dodge/RAM'],
            ['name' => 'Eagle'],
            ['name' => 'Ferrari'],
            ['name' => 'Fiat'],
            ['name' => 'Ford'],
            ['name' => 'Freightliner'],
            ['name' => 'Geely'],
            ['name' => 'Geo'],
            ['name' => 'Gonow'],
            ['name' => 'Great Wall'],
            ['name' => 'Hafei'],
            ['name' => 'Hino'],
            ['name' => 'Honda'],
            ['name' => 'Hummer'],
            ['name' => 'Hyundai'],
            ['name' => 'Infinity'],
            ['name' => 'International'],
            ['name' => 'Isuzu'],
            ['name' => 'Iveco'],
            ['name' => 'JAC'],
            ['name' => 'Jaguar'],
            ['name' => 'Janbei'],
            ['name' => 'Jeep'],
            ['name' => 'JMC'],
            ['name' => 'Kia'],
            ['name' => 'Lada'],
            ['name' => 'Lamborghini'],
            ['name' => 'Lancia'],
            ['name' => 'Land Rover'],
            ['name' => 'Lexus'],
            ['name' => 'Lifan'],
            ['name' => 'Lincoln'],
            ['name' => 'Lotus'],
            ['name' => 'Mack'],
            ['name' => 'Magiruz'],
            ['name' => 'Mahindra'],
            ['name' => 'Maserati'],
            ['name' => 'Mazda'],
            ['name' => 'Mercedes Benz'],
            ['name' => 'Mercury'],
            ['name' => 'MG'],
            ['name' => 'Mini'],
            ['name' => 'Mitsubishi'],
            ['name' => 'Nissan'],
            ['name' => 'Oldsmobile'],
            ['name' => 'Opel'],
            ['name' => 'Peugeot'],
            ['name' => 'Plymouth'],
            ['name' => 'Pontiac'],
            ['name' => 'Porsche'],
            ['name' => 'Proton'],
            ['name' => 'Rambler'],
            ['name' => 'Renault'],
            ['name' => 'Rolls Royce'],
            ['name' => 'Rover'],
            ['name' => 'Saab'],
            ['name' => 'Samsung'],
            ['name' => 'Saturn'],
            ['name' => 'Scania'],
            ['name' => 'Scion'],
            ['name' => 'Seat'],
            ['name' => 'Skoda'],
            ['name' => 'Smart'],
            ['name' => 'Subaru'],
            ['name' => 'Suzuki'],
            ['name' => 'Tianma'],
            ['name' => 'Tiger Truck'],
            ['name' => 'Toyota'],
            ['name' => 'Volkswagen'],
            ['name' => 'Volvo'],
            ['name' => 'Yugo']
        ];

        foreach($brands as $brand){
            Brand::create($brand);
        }

        // Seed all the transmission types
		$transmissions = [
            ['type' => 'Manual'],
            ['type' => 'Automático']
        ];

        foreach($transmissions as $transmission){
            Transmission::create($transmission);
        }

        // Seed all the fuel types
        $fuels = [
            ['type' => 'Gasolina'],
            ['type' => 'Diesel']
        ];

        foreach($fuels as $fuel){
            Fuel::create($fuel);
        }
	}

}
