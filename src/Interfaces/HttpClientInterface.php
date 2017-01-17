<?php
namespace Jeffreymoelands\OverheidIo\Interfaces;

interface HttpClientInterface
{

    public function send($url, $key, $query);
}