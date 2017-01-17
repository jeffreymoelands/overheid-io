<?php

use Jeffreymoelands\OverheidIo\Resources\Bag;
use Jeffreymoelands\OverheidIo\Resources\Kvk;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class BagTest extends TestCase
{

    private $resource = 'bag';


    /**
     * Test the construct and configuration of the bag class
     */
    public function test_bag_construct()
    {
        // Initialize the overheidIo class with api key
        $bag = new Bag('secret');

        // Check correct class type
        $this->assertTrue($bag instanceof \Jeffreymoelands\OverheidIo\Resources\Bag);

        // Check resource isset correctly
        $this->assertEquals($this->resource, $bag->getResource());
    }


    /**
     * Test the get function for bag resource
     */
    public function test_bag_get()
    {
        // mock the api class
        $mock = m::mock(Bag::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn($this->resource);
        $mock->shouldReceive('call')->once()->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Bag::class);
        $getMethod = $class->getMethod('get');
        $response = $getMethod->invoke($mock, '3015ba-nieuwe-binnenweg-10-a');

        // assert response
        $this->assertEquals('response', $response);
    }


    /**
     * Test the search function for bag resource
     */
    public function test_bag_search()
    {
        // mock the api class
        $mock = m::mock(Kvk::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn($this->resource);
        $mock->shouldReceive('call')->once()->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Bag::class);
        $searchMethod = $class->getMethod('search');
        $response = $searchMethod->invoke($mock);

        // assert response
        $this->assertEquals('response', $response);
    }


    /**
     * Test the suggest function for bag resource
     */
    public function test_bag_suggest()
    {
        // mock the api class
        $mock = m::mock(Kvk::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn('kvk');
        $mock->shouldReceive('call')->once()->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Kvk::class);
        $suggestMethod = $class->getMethod('suggest');
        $response = $suggestMethod->invoke($mock, 'nieuwve');

        // assert response
        $this->assertEquals('response', $response);
    }

    /**
     * Test the query builder for bag resource
     *
     */
    public function test_query_builder()
    {
        $expected = [
            'size'        => 100,
            'page'        => 1,
            'ordering'    => 'desc',
            'fields'      => [ 'huisnummer', 'openbareruimtenaam' ],
            'filters'     => [ 'postcode' => '4866EN' ],
            'query'       => '10',
            'queryfields' => [ 'huisnummer' ]
        ];

        // setup bag
        $bag = new Bag('secret');
        $response = $bag->size(100)->page(1)->order('desc')->fields([ 'huisnummer', 'openbareruimtenaam' ])
            ->filters([ 'postcode' => '4866EN' ])->query('10')->queryfields([ 'huisnummer' ]);

        // check instance of bag
        $this->assertTrue($response instanceof \Jeffreymoelands\OverheidIo\Resources\Bag);

        // check array
        $this->assertEquals($expected, $bag->getQuery());
    }

}