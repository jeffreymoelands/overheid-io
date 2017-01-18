<?php

use Jeffreymoelands\OverheidIo\Clients\Client;
use PHPUnit\Framework\TestCase;
use Jeffreymoelands\OverheidIo\Resources\Api;
use Mockery as m;

class ApiTest extends TestCase
{

    /**
     * Test the get function of the abstract api class
     *
     */
    public function test_api_get()
    {
        // mock the api class
        $mock = m::mock(Api::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn('resource');
        $mock->shouldReceive('call')->once()->with('/api/resource/1')->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Api::class);
        $getMethod = $class->getMethod('get');
        $response = $getMethod->invoke($mock, '1');

        // assert response
        $this->assertEquals('response', $response);
    }


    /**
     * Test the search function of the abstract api class
     *
     */
    public function test_api_search()
    {
        // mock the api class
        $mock = m::mock(Api::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn('resource');
        $mock->shouldReceive('call')->once()->with('/api/resource')->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Api::class);
        $searchMethod = $class->getMethod('search');
        $response = $searchMethod->invoke($mock);

        // assert response
        $this->assertEquals('response', $response);
    }


    /**
     * Test the call function of the abstract api class
     *
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_api_call()
    {
        // mock client
        $clientmock = m::mock('overload:' . Client::class);
        $clientmock->shouldReceive('send')->once()->andReturn('response');

        // mock api class
        $mock = m::mock(Api::class);
        $mock->shouldReceive('getQuery')->once()->andReturn([]);

        // set call method accessible
        $class = new ReflectionClass(Api::class);
        $callMethod = $class->getMethod('call');
        $callMethod->setAccessible(true);
        $response = $callMethod->invoke($mock, '/url');

        // check response from client class
        $this->assertEquals('response', $response);
    }
}