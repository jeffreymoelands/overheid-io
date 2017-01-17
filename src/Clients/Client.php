<?php
namespace Jeffreymoelands\OverheidIo\Clients;

use Jeffreymoelands\OverheidIo\Interfaces\HttpClientInterface;

class Client
{
    /**
     * Client to call
     */
    private $client;


    /**
     * Client constructor.
     *
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    /**
     * Call the send function from HttpClientInterface class
     *
     * @param $url
     * @param $key
     * @param $query
     *
     * @return mixed
     */
    public function send($url, $key, $query)
    {
        return $this->client->send($url, $key, $query);
    }

}