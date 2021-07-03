<?php

use Illuminate\Database\Seeder;
use App\Utilisateurs as user ;
use Illuminate\Support\Facades\Hash;

class UtilisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::truncate();

        $faker = \Faker\Factory::create();

        //un pwd de test
        $pwdu = Hash::make("someTest");

        user::create([
            'nom' => "TAOUSSI", 
            'prenoms' => "Hamza",
            'email' => "thamza@gmail.com" ,
            'mot_de_passe'=> $pwdu ,
        ]);

        //On crée de faux utilisateurs
        for ($i = 0; $i < 35; $i++) {
            user::create([
                'nom' => $faker->name ,
                'prenoms' => $faker->lastname ,
                'email' => $faker->email ,
                'mot_de_passe'=> $faker->password ,
            ]);
        }
    }
}
