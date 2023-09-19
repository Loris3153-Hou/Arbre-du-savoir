<?php

namespace models;

class Lieu
{

    public $idLieu;
    public $adresseLieu;
    public $villeLieu;
    public $paysLieu;

    public function __construct() {
        $this->idLieu = "";
        $this->adresseLieu = "";
        $this->villeLieu = "";
        $this->paysLieu = "";
    }

    /**
     * @return string
     */
    public function getIdLieu()
    {
        return $this->idLieu;
    }

    /**
     * @param string $idLieu
     */
    public function setIdLieu($idLieu)
    {
        $this->idLieu = $idLieu;
    }

    /**
     * @return string
     */
    public function getAdresseLieu()
    {
        return $this->adresseLieu;
    }

    /**
     * @param string $adresseLieu
     */
    public function setAdresseLieu($adresseLieu)
    {
        $this->adresseLieu = $adresseLieu;
    }

    /**
     * @return string
     */
    public function getVilleLieu()
    {
        return $this->villeLieu;
    }

    /**
     * @param string $villeLieu
     */
    public function setVilleLieu($villeLieu)
    {
        $this->villeLieu = $villeLieu;
    }

    /**
     * @return string
     */
    public function getPaysLieu()
    {
        return $this->paysLieu;
    }

    /**
     * @param string $paysLieu
     */
    public function setPaysLieu($paysLieu)
    {
        $this->paysLieu = $paysLieu;
    }

}