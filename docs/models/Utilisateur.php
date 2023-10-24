<?php

namespace models;

class Utilisateur
{

    public $idUtilisateur;
    public $nomUtilisateur;
    public $prenomUtilisateur;
    public $dateNaisUtilisateur;
    public $mailUtilisateur;
    public $admintilisateur;
    public $mdpUtilisateur;
    public $dateInscUtilisateur;

    public function __construct()
    {
        $this->idUtilisateur = "";
        $this->nomUtilisateur = "";
        $this->prenomUtilisateur = "";
        $this->dateNaisUtilisateur = "";
        $this->mailUtilisateur = "";
        $this->admintilisateur = "";
        $this->mdpUtilisateur = "";
        $this->dateInscUtilisateur = "";
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur($prenomUtilisateur)
    {
        $this->prenomUtilisateur = $prenomUtilisateur;
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
        $this->mailUtilisateur = $mailUtilisateur;
    }

    public function getAdmintilisateur()
    {
        return $this->admintilisateur;
    }

    public function setAdmintilisateur($admintilisateur)
    {
        $this->admintilisateur = $admintilisateur;
    }

    public function getMdpUtilisateur()
    {
        return $this->mdpUtilisateur;
    }

    public function setMdpUtilisateur($mdpUtilisateur)
    {
        $this->mdpUtilisateur = $mdpUtilisateur;
    }

    public function getDateInscUtilisateur()
    {
        return $this->dateInscUtilisateur;
    }

    public function setDateInscUtilisateur($dateInscUtilisateur)
    {
        $this->dateInscUtilisateur = $dateInscUtilisateur;
    }


}