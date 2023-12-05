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
        $this->idLieu = filter_var($idLieu, FILTER_SANITIZE_NUMBER_INT);
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
        $this->adresseLieu = filter_var($adresseLieu, FILTER_SANITIZE_STRING);
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
        $this->villeLieu = filter_var($villeLieu, FILTER_SANITIZE_STRING);
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
        $this->paysLieu = filter_var($paysLieu, FILTER_SANITIZE_STRING);
    }

}