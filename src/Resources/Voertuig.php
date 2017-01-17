<?php
namespace Jeffreymoelands\OverheidIo\Resources;

class Voertuig extends Api
{

    public function __construct($key)
    {
        $this->setResource('voertuiggegevens');

        parent::__construct($key);
    }
}