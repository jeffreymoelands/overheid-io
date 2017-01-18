<?php
namespace Jeffreymoelands\OverheidIo\Resources;

class Kvk extends Api
{

    /**
     * Kvk constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->resource = 'kvk';

        parent::__construct($key);
    }


    /**
     * Get kvk information by dossier number and sob dossier number
     *
     * @param string $dossierNumber
     * @param string $subDossierNumber
     *
     * @return mixed
     */
    public function get($dossierNumber, $subDossierNumber = '0000')
    {
        return $this->call('/api/' . $this->getResource() . '/' . $dossierNumber . '/' . $subDossierNumber);
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
        return $this->call('/suggest/' . $this->getResource() . '/' . $search);
    }
}


