<?php

namespace models;

class CommandeFormation
{

    public $idCommande;
    public $idFormation;
    public $nbFormation;

    public function __construct() {
        $this->idCommande = "";
        $this->idFormation = "";
        $this->nbFormation = "";
    }

    /**
     * @return string
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param string $idCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return string
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    /**
     * @param string $idFormation
     */
    public function setIdFormation($idFormation)
    {
        $this->idFormation = $idFormation;
    }

    /**
     * @return string
     */
    public function getNbFormation()
    {
        return $this->nbFormation;
    }

    /**
     * @param string $nbFormation
     */
    public function setNbFormation($nbFormation)
    {
        $this->nbFormation = $nbFormation;
    }



}