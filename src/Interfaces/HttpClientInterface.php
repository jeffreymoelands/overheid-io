<?php
namespace Jeffreymoelands\OverheidIo\Interfaces;

interface HttpClientInterface
{

    /**
     * send api call
     *
     * @param $url
     * @param $key
     * @param $query
     *
     * @return mixed
     */
    public function send($url, $key, $query);
}