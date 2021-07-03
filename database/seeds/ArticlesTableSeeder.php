<?php

use Illuminate\Database\Seeder;
use App\Articles as livre;
use App\Categories as cat;
use App\Collections as colect;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //New faker : pour remplire le table avec de faux enregistrements
        $faker = \Faker\Factory::create();

        //On charges les categories de la base 
        $fake_cat = cat::get();

        //On charge les collections de la base
        $fake_collection = colect::get();


        // livre::create([
        //     'code' => 'LIV00987',
        //     'categorie_id' => $fake_cat[0]->id,
        //     'collection_id' => $fake_collection[0]->id,
        //     'nom' => 'Hassan II la mémoire d\'un grand Roi',
        //     'auteur' => 'Hassan II',
        //     'prix' => '200',
        //     'date_parution' => now(),
        //     'description' => 'Some Description',
        //     'langue' => 'Arabe',
        //     'nb_page' => '170',
        //     'editeur' => 'some editeur',
        // ]);


        //On crée de faux catégories
        for ($i = 0; $i < 35; $i++) {
            livre::create([
                'code' => $faker->unique()->word,
                'categorie_id' => $fake_cat[$i]->id,
                'collection_id' => $fake_collection[$i]->id,
                'nom' => $faker->unique()->word,
                'auteur' => $faker->name,
                'prix' => $faker->numberBetween($min = 30, $max = 1000),
                'date_parution' => now(),
                'description' => $faker->text($maxNbChars = 35),
                'langue' => 'Français',
                'nb_page' => $faker->numberBetween($min = 5, $max = 900),
                'editeur' => $faker->name.' '.$faker->unique()->word,
                'image' => 'public/img/articles/DefaultLivres.jpg',
            ]);
        }
    }
}
