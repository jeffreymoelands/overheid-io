<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Jeffreymoelands\OverheidIo\Clients\GuzzleHttpClient;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class GuzzleHttpClientTest extends TestCase
{

    /**
     * Test the construct and configuration of the GuzzleHttpClient class
     */
    public function test_guzzle_http_client_construct()
    {
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client([ 'handler' => $handler ]);
        $guzzleHttpClient = new GuzzleHttpClient($client);

        // Check correct class type
        $this->assertTrue($guzzleHttpClient instanceof \Jeffreymoelands\OverheidIo\Clients\GuzzleHttpClient);
    }


    /**
     * Test the call function of the GuzzleHttpClient class
     */
    public function test_guzzle_adapter_call()
    {
        // setup expected body
        $body = [
            'merk'                       => 'bmw',
            'aantalcilinders'            => 9,
            'datumaanvangtenaamstelling' => '2014-01-02T00:00:00+00:00'
        ];

        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], json_encode($body))
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client([ 'handler' => $handler ]);

        // Create guzzle client and call send method
        $guzzleHttpClient = new GuzzleHttpClient($client);
        $response = $guzzleHttpClient->send('api/voertuiggegevens', 'secret', []);

        // check response is object
        $this->assertTrue($response instanceof \stdClass);
        $this->assertEquals((object) $body, $response);
    }
}