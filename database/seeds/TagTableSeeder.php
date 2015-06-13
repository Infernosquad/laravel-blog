<?php

use App\Article;
use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $articles = Article::all();

        foreach ($articles as $article)
        {
            for ($i = 0; $i < 10; $i++) {
                Tag::create([
                    'tag'        => $faker->word,
                    'article_id' => $article->id
                ]);
            }
        }
    }
}
