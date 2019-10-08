<?php


namespace App\Services\Reddit;


class JsonDatabaseRedditClient implements RedditClient
{
    public function getArticles(string $subreddit)
    {
        $jsonDatabase = database_path(sprintf('reddit/%s.json', $subreddit));

        if (! file_exists($jsonDatabase)) {
            abort(404);
        }

        return collect(json_decode(file_get_contents(
            $jsonDatabase),
            true
        )['data']['children'])->map(function ($article) {
            return [
                'id' => $article->data->id,
                ''
            ]
        })

        return json_decode(file_get_contents(
            $jsonDatabase),
            true
        )['data']['children'];
    }

}
