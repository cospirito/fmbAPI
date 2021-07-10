<?php

use Illuminate\Database\Seeder;
use App\Librairies as lib;

class LibrairiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        lib::create([
            'nom' => 'LirairieMaarif',
            'adresse' => 'Maarif, Casablanca bd test',
            'tel' => '098767554',
            'site_url' => 'www.mylibmaarif.com',
            'logo' => 'tmp/test/sometes.jpeg',
            'ice' => 'sometest',
            'email' => 'libmaarif@gmail.com',
        ]);


        //On crée de faux catégories
        for ($i = 0; $i < 35; $i++) {
            $ice = $faker->unique()->word;

            lib::create([
                'nom' => $faker->name,
                'adresse' => $faker->streetAddress,
                'tel' => $faker->phoneNumber,
                'site_url' => $faker->unique()->domainName,
                // 'logo' => $faker->image($dir = 'public/img/librairies', $width = 640, $height = 480, 'cats', true, true, 'Faker'),
                'logo' => 'public/img/librairies/default.jpg',
                'ice' => $ice,
                'email' => $faker->unique()->email,
            ]);
        }
    }
}
