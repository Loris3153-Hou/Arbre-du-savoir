<?php

namespace models;

class Commande
{

    public $idCommande;
    public $dateCommande;
    public $idUtilisateur;

    public function __construct() {
        $this->idCommande = "";
        $this->dateCommande = "";
        $this->idUtilisateur = "";
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
        $this->idCommande = filter_var($idCommande, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * @return string
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * @param string $dateCommande
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * @return string
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param string $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = filter_var($idUtilisateur, FILTER_SANITIZE_NUMBER_INT);
    }

}