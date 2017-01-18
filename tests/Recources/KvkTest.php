<?php

use Jeffreymoelands\OverheidIo\Resources\Kvk;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class KvkTest extends TestCase
{

    private $resource = 'kvk';


    /**
     * Test the construct and configuration of the voertuig class
     */
    public function test_kvk_construct()
    {
        // Initialize the overheidIo class with api key
        $kvk = new Kvk('secret');

        // Check correct class type
        $this->assertTrue($kvk instanceof \Jeffreymoelands\OverheidIo\Resources\Kvk);
    }


    /**
     * Test the get function for kvk resource
     */
    public function test_kvk_get()
    {
        // mock the api class
        $mock = m::mock(Kvk::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn($this->resource);
        $mock->shouldReceive('call')->once()->with('/api/kvk/1/0001')->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Kvk::class);
        $getMethod = $class->getMethod('get');
        $response = $getMethod->invokeArgs($mock, [ '1', '0001' ]);

        // assert response
        $this->assertEquals('response', $response);
    }


    /**
     * Test the search function for kvk resource
     */
    public function test_kvk_search()
    {
        // mock the api class
        $mock = m::mock(Kvk::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn($this->resource);
        $mock->shouldReceive('call')->once()->with('/api/kvk')->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Kvk::class);
        $searchMethod = $class->getMethod('search');
        $response = $searchMethod->invoke($mock);

        // assert response
        $this->assertEquals('response', $response);
    }


    /**
     * Test the suggest function for kvk resource
     */
    public function test_kvk_suggest()
    {
        // mock the api class
        $mock = m::mock(Kvk::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn($this->resource);
        $mock->shouldReceive('call')->once()->with('/suggest/kvk/valk')->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Kvk::class);
        $suggestMethod = $class->getMethod('suggest');
        $response = $suggestMethod->invoke($mock, 'valk');

        // assert response
        $this->assertEquals('response', $response);
    }


    /**
     * Test the query builder for kvk resource
     *
     */
    public function test_query_builder()
    {
        $expected = [
            'size'        => 10,
            'page'        => 2,
            'ordering'    => 'asc',
            'fields'      => [ 'vestigingsnummer' ],
            'filters'     => [ 'postcode' => '3083cz' ],
            'query'       => 'd*size*',
            'queryfields' => [ 'handelsnaam' ]
        ];

        // setup bag
        $bag = new Kvk('secret');
        $response = $bag->size(10)->page(2)->order('asc')->fields([ 'vestigingsnummer' ])->filters([ 'postcode' => '3083cz' ])->query('d*size*')->queryfields([ 'handelsnaam' ]);

        // check instance of bag
        $this->assertTrue($response instanceof \Jeffreymoelands\OverheidIo\Resources\Kvk);

        // check array
        $this->assertEquals($expected, $bag->getQuery());
    }
}