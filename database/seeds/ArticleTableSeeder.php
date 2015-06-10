<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        for ($i = 0; $i < 100; $i++) {
            Article::create(array(
                'title' => $faker->text(20),
                'body'  => $faker->realText(1000),
            ));
        }
    }
}
