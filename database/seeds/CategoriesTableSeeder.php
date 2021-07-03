<?php

use Illuminate\Database\Seeder;
use App\Categories as cat;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        cat::create([
            'nom' => "HISTOIRE", 
            'description' => "Livre de ... ",
        ]);

        //On crée de faux catégories
        for ($i = 0; $i < 10; $i++) {
            cat::create([
                'nom' => $faker->unique()->word ,
                'description' => $faker->text($maxNbChars = 35) ,
            ]);
        }
    }

}
