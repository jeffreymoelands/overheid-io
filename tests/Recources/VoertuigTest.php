<?php

use Jeffreymoelands\OverheidIo\Resources\Voertuig;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class VoertuigTest extends TestCase
{

    private $resource = 'voertuiggegevens';


    /**
     * Test the construct and configuration of the voertuig class
     */
    public function test_voertuig_construct()
    {
        // Initialize the voertuig class with api key
        $voertuig = new Voertuig('secret');

        // Check correct class type
        $this->assertTrue($voertuig instanceof \Jeffreymoelands\OverheidIo\Resources\Voertuig);

        // Check resource isset correctly
        $this->assertEquals($this->resource, $voertuig->getResource());
    }


    /**
     * Test the get function for voertuig resource
     */
    public function test_voertuig_get()
    {
        // mock the api class
        $mock = m::mock(Voertuig::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn($this->resource);
        $mock->shouldReceive('call')->once()->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Voertuig::class);
        $getMethod = $class->getMethod('get');
        $response = $getMethod->invoke($mock, '01-JB-LP');

        // assert response
        $this->assertEquals('response', $response);
    }


    /**
     * Test the search function for voertuig resource
     */
    public function test_voertuig_search()
    {
        // mock the api class
        $mock = m::mock(Voertuig::class)->shouldAllowMockingProtectedMethods();
        $mock->shouldReceive('getResource')->once()->andReturn($this->resource);
        $mock->shouldReceive('call')->once()->andReturn('response');

        // create reflection class and call the test method
        $class = new ReflectionClass(Voertuig::class);
        $searchMethod = $class->getMethod('search');
        $response = $searchMethod->invoke($mock);

        // assert response
        $this->assertEquals('response', $response);
    }


    /**
     * Test the query builder for voertuig resource
     *
     */
    public function test_query_builder()
    {
        $expected = [
            'size'        => 100,
            'page'        => 1,
            'ordering'    => 'desc',
            'fields'      => [ 'eerstekleur', 'merk' ],
            'filters'     => [ 'merk' => 'bmw' ],
            'query'       => '*laren',
            'queryfields' => [ 'merk' ]
        ];

        // setup bag
        $bag = new Voertuig('secret');
        $response = $bag->size(100)->page(1)->order('desc')->fields([ 'eerstekleur', 'merk' ])
            ->filters([ 'merk' => 'bmw' ])->query('*laren')->queryfields([ 'merk' ]);

        // check instance of bag
        $this->assertTrue($response instanceof \Jeffreymoelands\OverheidIo\Resources\Voertuig);

        // check array
        $this->assertEquals($expected, $bag->getQuery());
    }

}