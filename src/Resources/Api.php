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
    private $base;

    /**
     * @var api key
     */
    private $key;

    /**
     * @var api resource
     */
    protected $resource;


    /**
     * Api constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->base = 'https://overheid.io/';
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
        // setup client with instance of HttpClientInterface for easily swap out the client http class
        $client = new Client(new GuzzleHttpClient(new \GuzzleHttp\Client()));

        // setup url
        $url = $this->getBase() . $url;

        // call send method
        return $client->send($url, $this->getKey(), $this->getQuery());
    }


    /**
     * Get API base
     *
     * @return Api
     */
    protected function getBase()
    {
        return $this->base;
    }


    /**
     * Get API key
     *
     * @return Api
     */
    protected function getKey()
    {
        return $this->key;
    }


    /**
     * Get API recource
     *
     * @return Api
     */
    protected function getResource()
    {
        return $this->resource;
    }
}