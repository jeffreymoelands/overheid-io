<?php
namespace Jeffreymoelands\OverheidIo\Resources;

class Kvk extends Api
{

    public function __construct($key)
    {
        $this->setResource('kvk');

        parent::__construct($key);
    }


    public function get($dossierNumber, $subDossierNumber = '0000')
    {
        return $this->call('/api/' . $this->getResource() . '/' . $dossierNumber . '/' . $subDossierNumber);
    }


    public function suggest($search)
    {
        return $this->call('/suggest/' . $this->getResource() . '/' . $search);
    }
}


