<?php

namespace controlleurs;

use models\Formation;

include(__DIR__ . "/../DAO/FormationDAO.php");

class FormationControlleur
{

    public $formationDAO;
    public $listeFormations;

    function __construct()
    {
        $this->formationDAO = new \formationDAO();
        $this->listeFormations = $this->formationDAO->getToutesLesFormations();
    }

    public function afficherToutesLesFormationsPageListeProduits()
    {
        $html = "";
        foreach ($this->listeFormations as $formation) {
            $html .= "<div class='produit'>
                        <img src='../images/" . $formation->getPhotoFormation() . "' alt='" . $formation->getPhotoFormation() . "' width='400' height='220'>
                        <h2>" . $formation->getTitreFormation() . "</h2>
                        <p>Description du produit</p>
                      </div>";
        }
        echo $html;
    }

    public function afficherToutesLesFormationsPageAdmin()
    {
        $html = "";
        foreach ($this->listeFormations as $formation) {
            $html .= "<li class='produit-item'>
                            <h2 class='item'>" . $formation->getTitreFormation() . "</h2>
                            <p class='produit-info item'>" . $formation->getDescFormation() . "</p>
                            <p class='produit-info item'>" . $formation->getPhotoFormation() . "</p>
                            <p class='produit-info item'>";

            foreach ($formation->getListeCategories() as $categorie) {
                $html .= $categorie->getNomCategorie() . "</br>";
            }

            $html .= "</p>
                            <p class='produit-info item'>" . $formation->getPrixFormation() . " $ </p>
                            <p class='produit-info item'>";

            foreach ($formation->getListeLieux() as $lieu) {
                $html .= $lieu->getVilleLieu() . "</br>";
            }

            $html .= "</p>
                            <p class='produit-info item'>" . $formation->getDateDebutFormation() . "</p>
                            <p class='produit-info item'>" . $formation->getDateFinFormation() . "</p>
                            <p class='produit-info item'>" . $formation->getCertificationFormation() . "</p>
                            <p class='produit-info item'>" . $formation->getNiveauFormation() . "</p>
                            <div class='line-buttons'>
                                <button class='line-button item' onclick='goPageModifierProduit(" . $formation->getIdFormation() . " )'>Modifier</button>
                                <button class='line-button item' onclick='goPageSupprimerProduit()'>Supprimer</button>
                            </div>
                        </li>";
        }
        echo $html;
    }

    public function saisieInputPageModifier($idFormation)
    {
        $html = "";

        foreach ($this->listeFormations as $formation) {
            if ( $formation->getIdFormation() == $idFormation) {
            echo
            $html .= "<div class='div3'>
                <h3 class='text'>Nom du produit</h3>
                <input class='entrer' type='text' value='" . $formation->getTitreFormation() . "'>
                </div>
                <div class='div4'>
                <h3 class='text'>Catégorie</h3>
                <input class='entrer' type='text' value='Marketing'>
                </div>
                <div class='div5'>
                <h3 class='text'>Prix</h3>
                <input class='entrer' type='text' value='Gratuit'>
                </div>
                <div class='div6'>
                <h3 class='text'>Lieux</h3>
                <input class='entrer' type='text' value='En ligne'>
                </div>
                <div class='div7'>
                <h3 class='text'>Date début</h3>
                <input class='entrer' type='text' value='30 novembre 2023'>
                </div>
                <div class='div8'>
                <h3 class='text'>Date fin</h3>
                <input class='entrer' type='text' value='05 décembre 2023'>
                </div>
                <div class='div12'>
                <h3 class='text'>Heure</h3>
                <input class='entrer' type='text' value='15:00'>
                </div>
                <div class='div9'>
                <h3 class='text'>Détails</h3>
                            <input class='entrer' type='text' value='Cette formation couvre les stratégies avancées de marketing en ligne, y compris le référencement, la publicité payante, l analyse des données et la gestion des médias sociaux. Elle est dispensée par des experts de l industrie.'>
                        </div>
                        <div class='div10'>
                            <button class='boutton' type='button'>Modifier</button>
                        </div>
                        <div class='div11'>
                            <button class='boutton' type='button' onclick='annulerModification()'>Annuler</button>
                        </div>";
            echo $html;
            }
        }
    }

}