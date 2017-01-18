<?php
namespace Jeffreymoelands\OverheidIo\Clients;

use Jeffreymoelands\OverheidIo\Interfaces\HttpClientInterface;

class GuzzleHttpClient implements HttpClientInterface
{

    private $client;


    /**
     * GuzzleHttpClient constructor.
     *
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }


    /**
     * send api call by guzzle
     *
     * @param $url
     * @param $key
     * @param $query
     *
     * @return mixed
     */
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