<?php
namespace Jeffreymoelands\OverheidIo\Resources;

class Bag extends Api
{

    public function __construct($key)
    {
        $this->setResource('bag');

        parent::__construct($key);
    }


    public function suggest($search)
    {
        return $this->call('suggest/' . $this->getResource() . '/' . $search);
    }
}