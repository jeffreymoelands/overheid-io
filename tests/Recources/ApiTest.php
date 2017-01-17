<?php

use Jeffreymoelands\OverheidIo\Clients\Client;
use PHPUnit\Framework\TestCase;
use Jeffreymoelands\OverheidIo\Resources\Api;
use Mockery as m;

class ApiTest extends TestCase
{

    public function test_api_get()
    {
        // mock the api class
        $mock = m::mock(Api::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn('resource');
        $mock->shouldReceive('call')->once()->andReturn('resource');

        // create reflection class and call the test method
        $class = new ReflectionClass(Api::class);
        $getMethod = $class->getMethod('get');
        $getMethod->invoke($mock, '1');
    }


    public function test_api_search()
    {
        // mock the api class
        $mock = m::mock(Api::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn('resource');
        $mock->shouldReceive('call')->once()->andReturn('resource');

        // create reflection class and call the test method
        $class = new ReflectionClass(Api::class);
        $searchMethod = $class->getMethod('search');
        $searchMethod->invoke($mock);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_api_call()
    {
        // mock client
        $clientmock = m::mock('overload:' . Client::class);
        $clientmock->shouldReceive('send')->once()->andReturn('object');

        // mock api class
        $mock = m::mock(Api::class);
        $mock->shouldReceive('getQuery')->once()->andReturn([]);

        // set call method accessible
        $class = new ReflectionClass(Api::class);
        $callMethod = $class->getMethod('call');
        $callMethod->setAccessible(true);
        $response = $callMethod->invoke($mock, '/url');

        // check response from client class
        $this->assertEquals('object', $response);
    }


    public function tearDown()
    {
        // Close mockery
        m::close();

    }
}