<?php
namespace Jeffreymoelands\OverheidIo\Resources;

class Voertuig extends Api
{

    /**
     * Voertuig constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->resource = 'voertuiggegevens';

        parent::__construct($key);
    }
}