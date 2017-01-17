<?php
namespace Jeffreymoelands\OverheidIo;

use Jeffreymoelands\OverheidIo\Resources\Bag;
use Jeffreymoelands\OverheidIo\Resources\Kvk;
use Jeffreymoelands\OverheidIo\Resources\Voertuig;

class OverheidIo
{

    private $key;


    /**
     * OverheidIo constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }


    /**
     * Setup voertuig resource
     *
     * @return Voertuig
     */
    public function voertuig()
    {
        return new Voertuig($this->key);
    }


    /**
     * Setup kvk resource
     *
     * @return Kvk
     */
    public function kvk()
    {
        return new Kvk($this->key);
    }


    /**
     * Setup bag resource
     *
     * @return Bag
     */
    public function bag()
    {
        return new Bag($this->key);
    }
}