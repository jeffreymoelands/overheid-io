<?php

use Jeffreymoelands\OverheidIo\Clients\Client;
use Jeffreymoelands\OverheidIo\Clients\GuzzleHttpClient;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class ClientTest extends TestCase
{

    /**
     * Test the construct and configuration of the client class
     */
    public function test_client_construct()
    {
        // mock the api class
        $mock = m::mock(GuzzleHttpClient::class);

        // check instance client
        $client = new Client($mock);
        $this->assertTrue($client instanceof \Jeffreymoelands\OverheidIo\Clients\Client);
    }

    /**
     * Test the client send method
     */
    public function test_client_send()
    {
        // mock the api class
        $mock = m::mock(GuzzleHttpClient::class);
        $mock->shouldReceive('send')->once()->andReturn('response');

        // create client
        $client = new Client($mock);
        $response = $client->send('api/voertuiggegevens', 'secret', []);

        // check response
        $this->assertEquals('response', $response);
    }
}