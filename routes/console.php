<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('display', function () {
    $this->line('This is a line');
    $this->info('This is info');
    $this->question('What day is it?');
    $this->warn('This is a warning');
    $this->error('This is an error');
});


Artisan::command('robert', function () {
    $headers = ['ID', 'Name', 'Email'];
    $rows = [
        [1, 'Beau Simensen', 'beau@dflydev.com'],
        [2, 'Laravel Training', 'training@laravel.com'],
    ];

    $this->table($headers, $rows);
});

Artisan::command('r {subreddit}', function ($subreddit, \App\Services\Reddit\RedditClient $redditClient) {
    dd($redditClient->getArticles($subreddit)[0]);
});

Artisan::command('book {venue?}', function () {

    $name = $this->ask('What is your name?');
    $venue = $this->argument('venue');

    if (! $venue) {
        $venue = $this->ask('What venue would you like to book?');
    }

    $pin = $this->secret('What is the PIN?');
    if ($pin != '1234') {
        $this->error('Incorrect PIN');

        return;
    }

    $this->info('Booking: ' . $venue . ' (for ' . $name .')');
})->describe('Book a Venue');
