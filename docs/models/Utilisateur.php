<?php

namespace models;

class Utilisateur
{

    public $idUtilisateur;
    public $nomUtilisateur;
    public $prenomUtilisateur;
    public $dateNaisUtilisateur;
    public $mailUtilisateur;
    public $mdpUtilisateur;
    public $adminUtilisateur;
    public $listeCommandes;

    public function __construct()
    {
        $this->idUtilisateur = "";
        $this->nomUtilisateur = "";
        $this->prenomUtilisateur = "";
        $this->dateNaisUtilisateur = "";
        $this->mailUtilisateur = "";
        $this->mdpUtilisateur = "";
        $this->adminUtilisateur = "";
        $this->listeCommandes = array();
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = filter_var($idUtilisateur, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = filter_var($nomUtilisateur, FILTER_SANITIZE_STRING);
    }

    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur($prenomUtilisateur)
    {
        $this->prenomUtilisateur = filter_var($prenomUtilisateur, FILTER_SANITIZE_STRING);
    }

    public function getDateNaisUtilisateur()
    {
        return $this->dateNaisUtilisateur;
    }

    public function setDateNaisUtilisateur($dateNaisUtilisateur)
    {
        $this->dateNaisUtilisateur = $dateNaisUtilisateur;
    }

    public function getMailUtilisateur()
    {
        return $this->mailUtilisateur;
    }

    public function setMailUtilisateur($mailUtilisateur)
    {
        $this->mailUtilisateur = filter_var($mailUtilisateur, FILTER_SANITIZE_EMAIL);
    }

    public function getMdpUtilisateur()
    {
        return $this->mdpUtilisateur;
    }

    public function setMdpUtilisateur($mdpUtilisateur)
    {
        $this->mdpUtilisateur = filter_var($mdpUtilisateur, FILTER_SANITIZE_STRING);
    }

    public function getAdminUtilisateur(): string
    {
        return $this->adminUtilisateur;
    }

    public function setAdminUtilisateur(string $adminUtilisateur): void
    {
        $this->adminUtilisateur = filter_var($adminUtilisateur, FILTER_SANITIZE_NUMBER_INT);
    }


    /**
     * @return array
     */
    public function getListeCommandes()
    {
        return $this->listeCommandes;
    }

    /**
     * @param array $listeCommandes
     */
    public function setListeCommandes($listeCommandes)
    {
        $this->listeCommandes = $listeCommandes;
    }



}