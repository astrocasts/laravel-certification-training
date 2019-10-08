<?php

use Illuminate\Database\Seeder;

class SubredditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $php = new \App\Subreddit([
            'name' => 'php',
        ]);

        $php->save();

        $laravel = new \App\Subreddit([
            'name' => 'laravel',
        ]);

        $laravel->save();
    }
}
