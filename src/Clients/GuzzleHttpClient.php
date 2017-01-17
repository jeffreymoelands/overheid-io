<?php
namespace Jeffreymoelands\OverheidIo\Clients;

use Jeffreymoelands\OverheidIo\Interfaces\HttpClientInterface;

class GuzzleHttpClient implements HttpClientInterface
{

    private $client;


    public function __construct($client)
    {
        $this->client = $client;
    }


    public function send($url, $key, $query)
    {
        $response = $this->client->request('GET', $url, [
            'headers' => [
                'ovio-api-key' => $key
            ],
            'query'   => $query
        ]);

        return \GuzzleHttp\json_decode($response->getBody());
    }
}