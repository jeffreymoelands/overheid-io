<?php
namespace Jeffreymoelands\OverheidIo\Clients;

use Jeffreymoelands\OverheidIo\Interfaces\HttpClientInterface;

class CurlHttpClient implements HttpClientInterface
{

    public function send($url, $key, $query)
    {
        # add authentication headers
        $headers = [];
        $headers[] = 'Content-type: application/json';
        $headers[] = 'ovio-api-key: ' . $key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($query));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $data = curl_exec($ch);

        curl_close($ch);

        return json_decode($data);
    }
}