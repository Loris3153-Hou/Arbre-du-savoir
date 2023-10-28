<?php

namespace models;

class ItemPanier
{

    public $formation;
    public $nbFormation;
    public $villeFormation;

    public function __construct($formation, $nbFormation, $villeFormation) {
        $this->formation = $formation;
        $this->nbFormation = $nbFormation;
        $this->villeFormation;
    }

    /**
     * @return mixed
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * @param mixed $formation
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;
    }

    /**
     * @return mixed
     */
    public function getNbFormation()
    {
        return $this->nbFormation;
    }

    /**
     * @param mixed $nbFormation
     */
    public function setNbFormation($nbFormation)
    {
        $this->nbFormation = $nbFormation;
    }

    /**
     * @return mixed
     */
    public function getVilleFormation()
    {
        return $this->villeFormation;
    }

    /**
     * @param mixed $villeFormation
     */
    public function setVilleFormation($villeFormation)
    {
        $this->villeFormation = $villeFormation;
    }



}