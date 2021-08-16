<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        User::factory(10)->create();
        Profile::factory(10)->create();
        Tag::factory(5)->create();
        Article::factory(10)->create()->each(function ($article) {
            $ids = range(1, 10);
            shuffle($ids);//trộn
            $sliced = array_slice($ids, 1, 3);
            $article->tags()->attach($sliced);
        });
    }
}
