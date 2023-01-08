<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Article;
use App\Models\ArticleComment;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // DB::table('articles')->insert([
        //     'name' => 'Laravel 9',
        //     'body' => 'As you may know, Laravel transitioned to yearly releases with the release of Laravel 8. Previously, major versions were released every 6 months. This transition is intended to ease the maintenance burden on the community and challenge our development team to ship amazing, powerful new features without introducing breaking changes.'
        // ]);

        $article1 = Article::factory()
            ->create([
                'name' => 'Why Laravel?', 
                'body' => 'There are a variety of tools
                 and frameworks available to you when 
                 building a web application. However, 
                 we believe Laravel is the best choice for 
                 building modern, full-stack web applications.'
            ]);

        $article2 = Article::factory()
            ->create([
                'name' => 'Laravel & Docker', 
                'body' => 'We want it to be as easy as possible 
                to get started with Laravel regardless of your 
                preferred operating system. So, there are a variety 
                of options for developing and running a Laravel project 
                on your local machine. While you may wish to explore 
                these options at a later time, Laravel provides Sail, 
                a built-in solution for running your Laravel project 
                using Docker.'
            ]);

        Article::factory()
            ->count(2)
            ->state(new Sequence(
                [
                    'name' => 'Eloquent', 
                    'body' => 'Laravel includes Eloquent, an 
                    object-relational mapper (ORM) that makes it 
                    enjoyable to interact with your database. When 
                    using Eloquent, each database table has a corresponding 
                    "Model" that is used to interact with that table. In 
                    addition to retrieving records from the database table, 
                    Eloquent models allow you to insert, update, and delete 
                    records from the table as well.'
                ],
                [
                    'name' => 'React', 
                    'body' => 'When using Vite with React, you will need to 
                    ensure that any files containing JSX have a .jsx or 
                    .tsx extension, remembering to update your entry point, 
                    if required, as shown above. You will also need to 
                    include the additional @viteReactRefresh Blade directive 
                    alongside your existing @vite directive.'
                ]
            ))
            ->create();

        ArticleComment::factory()
            ->count(3)
            ->for($article1)
            ->state(new Sequence(
                ['content' => 'Thanks for new article))'],
                ['content' => 'Can i use it with React?'],
                ['content' => 'Very interesting']
            ))
            ->create();

        ArticleComment::factory()
            ->count(2)
            ->for($article2)
            ->state(new Sequence(
                ['content' => 'Docker is best solution'],
                ['content' => 'Cool!!!']
            ))
            ->create();
    }
}
