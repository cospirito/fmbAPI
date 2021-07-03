<?php

use Illuminate\Database\Seeder;
use App\Articles as art;
use App\Librairies as lib;
use App\ArticlesLibrairies as al;

class ArticlesLibrairiesTableSeeder extends Seeder
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

        //On charges les arcticles de la base 
        $fake_art = art::get();

        //On charge les collections de la base
        $fake_lib = lib::get();

        al::create([
            'code_article' => $fake_art[0]->code,
            'librairie_id' => $fake_lib[0]->id,
        ]);

        for ($i = 0; $i <=20; $i++){
            $j = $i+1;
            al::create([
                'code_article' => $fake_art[$j]->code,
                'librairie_id' => $fake_lib[$j]->id,
            ]);
        }
    }
}
