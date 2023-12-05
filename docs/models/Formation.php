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
        $this->dateDebutFormation = date("Y/m/d");
        $this->dateFinFormation = date("Y/m/d");
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
        $this->idFormation = filter_var($idFormation, FILTER_SANITIZE_STRING);;
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
        $this->titreFormation = filter_var($titreFormation, FILTER_SANITIZE_STRING);
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
        $this->descFormation = filter_var($descFormation, FILTER_SANITIZE_STRING);
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
        $this->photoFormation = filter_var($photoFormation, FILTER_SANITIZE_STRING);
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
        $this->prixFormation = filter_var($prixFormation, FILTER_SANITIZE_STRING);
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
        $this->niveauFormation = filter_var($niveauFormation, FILTER_SANITIZE_STRING);
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
        $this->certificationFormation = filter_var($certificationFormation, FILTER_SANITIZE_STRING);
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