<?php
namespace Jeffreymoelands\OverheidIo\Resources;

use Jeffreymoelands\OverheidIo\Clients\Client;
use Jeffreymoelands\OverheidIo\Clients\GuzzleHttpClient;
use Jeffreymoelands\OverheidIo\Traits\queryBuilder;

abstract class Api
{

    use queryBuilder;

    /**
     * @var api base
     */
    private $base = 'https://overheid.io/';

    /**
     * @var api key
     */
    private $key;

    /**
     * @var api resource
     */
    private $resource;


    /**
     * Api constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }


    /**
     * Get information by query
     *
     * @param string $query
     *
     * @return mixed
     */
    public function get($query)
    {
        return $this->call('/api/' . $this->getResource() . '/' . $query);
    }


    /**
     * Search for information
     *
     * @return mixed
     */
    public function search()
    {
        return $this->call('/api/' . $this->getResource());
    }


    /**
     * Call url client
     *
     * @param $url
     *
     * @return mixed
     */
    protected function call($url)
    {
        // setup client with instance of HttpClientInterface
        $client = new Client(new GuzzleHttpClient(new \GuzzleHttp\Client()));

        // call send method
        return $client->send($this->base . $url, $this->key, $this->getQuery());
    }


    /**
     * Get api resource
     *
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }


    /**
     * Set the api resource
     *
     * @param mixed $resource
     */
    protected function setResource($resource)
    {
        $this->resource = $resource;
    }
}