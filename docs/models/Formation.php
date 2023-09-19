<?php

namespace models;

class Formation
{
    public $idFormation;
    public $titreFormation;
    public $descFormation;
    public $photoFormation;
    public $prixFormation;
    public $niveauFormation;
    public $certificationFormation;
    public $dateDebutFormation;
    public $dateFinFormation;
    public $listeCategories;
    public $listeLieux;

    public function __construct() {
        $this->idFormation = "";
        $this->titreFormation = "";
        $this->descFormation = "";
        $this->photoFormation = "";
        $this->prixFormation = "";
        $this->niveauFormation = "";
        $this->certificationFormation = "";
        $this->dateDebutFormation = "";
        $this->dateFinFormation = "";
        $this->listeCategories = array();
        $this->listeLieux = array();
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
    public function getTitreFormation()
    {
        return $this->titreFormation;
    }

    /**
     * @param string $titreFormation
     */
    public function setTitreFormation($titreFormation)
    {
        $this->titreFormation = $titreFormation;
    }

    /**
     * @return string
     */
    public function getDescFormation()
    {
        return $this->descFormation;
    }

    /**
     * @param string $descFormation
     */
    public function setDescFormation($descFormation)
    {
        $this->descFormation = $descFormation;
    }

    /**
     * @return string
     */
    public function getPhotoFormation()
    {
        return $this->photoFormation;
    }

    /**
     * @param string $photoFormation
     */
    public function setPhotoFormation($photoFormation)
    {
        $this->photoFormation = $photoFormation;
    }

    /**
     * @return string
     */
    public function getPrixFormation()
    {
        return $this->prixFormation;
    }

    /**
     * @param string $prixFormation
     */
    public function setPrixFormation($prixFormation)
    {
        $this->prixFormation = $prixFormation;
    }

    /**
     * @return string
     */
    public function getNiveauFormation()
    {
        return $this->niveauFormation;
    }

    /**
     * @param string $niveauFormation
     */
    public function setNiveauFormation($niveauFormation)
    {
        $this->niveauFormation = $niveauFormation;
    }

    /**
     * @return string
     */
    public function getCertificationFormation()
    {
        return $this->certificationFormation;
    }

    /**
     * @param string $certificationFormation
     */
    public function setCertificationFormation($certificationFormation)
    {
        $this->certificationFormation = $certificationFormation;
    }

    /**
     * @return string
     */
    public function getDateDebutFormation()
    {
        return $this->dateDebutFormation;
    }

    /**
     * @param string $dateDebutFormation
     */
    public function setDateDebutFormation($dateDebutFormation)
    {
        $this->dateDebutFormation = $dateDebutFormation;
    }

    /**
     * @return string
     */
    public function getDateFinFormation()
    {
        return $this->dateFinFormation;
    }

    /**
     * @param string $dateFinFormation
     */
    public function setDateFinFormation($dateFinFormation)
    {
        $this->dateFinFormation = $dateFinFormation;
    }

    /**
     * @return array
     */
    public function getListeCategories()
    {
        return $this->listeCategories;
    }

    /**
     * @param array $listeCategories
     */
    public function setListeCategories($listeCategories)
    {
        $this->listeCategories = $listeCategories;
    }

    /**
     * @return array
     */
    public function getListeLieux()
    {
        return $this->listeLieux;
    }

    /**
     * @param array $listeLieux
     */
    public function setListeLieux($listeLieux)
    {
        $this->listeLieux = $listeLieux;
    }



}