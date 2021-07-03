<?php

use Illuminate\Database\Seeder;
use App\Contacts as cont;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        cont::create([
            'nom' => "Maxwell", 
            'email' => "maxwelcoach@gmail.com",
            'tel' => "7809876654",
            'commentaire' => "Some comment ...",
        ]);

        //On crée de faux catégories
        for ($i = 0; $i < 35; $i++) {
            cont::create([
                'nom' => $faker->name, 
                'email' => $faker->email,
                'tel' => $faker->phoneNumber,
                'commentaire' => $faker->text($maxNbChars = 100),

            ]);
        }
    }
}
