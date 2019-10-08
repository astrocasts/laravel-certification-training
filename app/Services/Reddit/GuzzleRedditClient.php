<?php


namespace App\Services\Reddit;


use GuzzleHttp\Client;

class GuzzleRedditClient implements RedditClient
{
    private $client;

    /**
     * GuzzleRedditClient constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getArticles(string $subreddit)
    {
        $url = sprintf('https://www.reddit.com/r/%s.json', $subreddit);

        $jsonResponse = $this->client->request('GET', $url);

        if ($jsonResponse->getStatusCode() !== 200) {
            abort($jsonResponse->getStatusCode());
        }

        return json_decode($jsonResponse->getBody()->getContents(), true)['data']['children'];
    }
}
