<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();

        Model::unguard();

        $this->call('UserTableSeeder');
        $this->call('ArticleTableSeeder');
        $this->call('CommentTableSeeder');
        $this->call('TagTableSeeder');

        Model::reguard();
    }
}
