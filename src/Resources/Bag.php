<?php
namespace Jeffreymoelands\OverheidIo\Resources;

class Bag extends Api
{

    /**
     * Bag constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->resource = 'bag';

        parent::__construct($key);
    }


    /**
     * Suggest kvk items by search string
     *
     * @param $search
     *
     * @return mixed
     */
    public function suggest($search)
    {
        return $this->call('suggest/' . $this->getResource() . '/' . $search);
    }
}