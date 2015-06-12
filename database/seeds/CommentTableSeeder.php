<?php

use App\Article;
use App\Comment;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
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
            for ($i = 0; $i < 20; $i++) {
                Comment::create([
                    'comment'    => $faker->sentences(3, true),
                    'article_id' => $article->id
                ]);
            }
        }

    }
}
