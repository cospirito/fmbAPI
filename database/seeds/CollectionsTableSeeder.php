<?php

use Illuminate\Database\Seeder;
use App\Collections as colect;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        colect::create([
            'nom' =>'Collection 01',
            'description' =>'Collection 01 description ',
        ]);


        //On crée de faux catégories
        for ($i = 0; $i < 35; $i++) {
            colect::create([
                'nom' => $faker->unique()->word ,
                'description' => $faker->text($maxNbChars = 35) ,
            ]);
        }
    }
}
