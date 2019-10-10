<?php


namespace App\Services\Reddit;



class CacheRedditClient implements RedditClient
{
    private $redditClient;
    private $cacheTimeInSeconds;

    public function __construct(RedditClient $redditClient, int $cacheTimeInSeconds = 300)
    {
        $this->redditClient = $redditClient;
        $this->cacheTimeInSeconds = $cacheTimeInSeconds;
    }

    public function getArticles(string $subreddit)
    {
        $key = sprintf('reddit.subreddit.getArticles.%s', $subreddit);

        return \Cache::remember($key, $this->cacheTimeInSeconds, function () use ($subreddit) {
            return $this->redditClient->getArticles($subreddit);
        });
    }

}
