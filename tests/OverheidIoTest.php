<?php

use Jeffreymoelands\OverheidIo\OverheidIo;
use Jeffreymoelands\OverheidIo\Resources\Api;
use Mockery as m;

class OverheidIoTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test the construct and configuration of the OverheidIo class
     */
    public function test_overheidio_construct()
    {
        // Initialize the overheidIo class with api key
        $overheidIo = new OverheidIo('secret');

        // Check correct class type
        $this->assertTrue($overheidIo instanceof \Jeffreymoelands\OverheidIo\OverheidIo);
    }


    /**
     * Test overheidio voertuig function
     */
    public function test_overheidio_vervoer()
    {
        // Initialize the overheidIo class with api key
        $overheidIo = new OverheidIo('secret');

        // Check correct class type
        $this->assertTrue($overheidIo->voertuig() instanceof \Jeffreymoelands\OverheidIo\Resources\Voertuig);
    }


    /**
     * Test overheidio kvk function
     */
    public function test_overheidio_kvk()
    {
        // Initialize the overheidIo class with api key
        $overheidIo = new OverheidIo('secret');

        // Check correct class type
        $this->assertTrue($overheidIo->kvk() instanceof \Jeffreymoelands\OverheidIo\Resources\Kvk);
    }


    /**
     * Test overheidio bag function
     */
    public function test_overheidio_bag()
    {
        // Initialize the overheidIo class with api key
        $overheidIo = new OverheidIo('secret');

        // Check correct class type
        $this->assertTrue($overheidIo->bag() instanceof \Jeffreymoelands\OverheidIo\Resources\Bag);
    }
}