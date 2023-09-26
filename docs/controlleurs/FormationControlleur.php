<?php

namespace controlleurs;

use models\Formation;

include_once(__DIR__ . "/../DAO/FormationDAO.php");
include_once(__DIR__ . "/LieuControlleur.php");
include_once(__DIR__ . "/CategorieControlleur.php");

class FormationControlleur
{

    public $formationDAO;
    public $listeFormations;
    public $lieuController;
    public $categorieController;
    function __construct()
    {
        $this->formationDAO = new \formationDAO();
        $this->listeFormations = $this->formationDAO->getToutesLesFormations();
        $this->lieuController = new LieuControlleur();
        $this->categorieController = new CategorieControlleur();
    }

    public function afficherToutesLesFormationsPageListeProduits()
    {
        $html = "";
        foreach ($this->listeFormations as $formation) {
            $html .= "<div class='produit' onclick='goPageDescriptionProduit(" . $formation->getIdFormation() . ")'>
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
                                <button class='line-button item' onclick='goPageModifierProduit(" . $formation->getIdFormation() . ")'>Modifier</button>
                                <button class='line-button item' onclick='goPageSupprimerProduit(" . $formation->getIdFormation() . ")'>Supprimer</button>
                            </div>
                        </li>";
        }
        echo $html;
    }

    public function ecrireNomFormation($idFormation)
    {
        foreach ($this->listeFormations as $formation) {
            if ($formation->getIdFormation() == $idFormation) {
                echo $formation->getTitreFormation();
            }
        }
    }

    public function saisieInputPageModifier($idFormation)
    {
        $html = "";

        foreach ($this->listeFormations as $formation) {
            if ($formation->getIdFormation() == $idFormation) {
                $html .= "
                <div class='div3'>
                <h3 class='text'>Nom du produit</h3>
                <input name='modifierFormationTitre' type='text' value='" . $formation->getTitreFormation() . "' required>
                </div>
                <div class='div4'>
                <h3 class='text'>Catégorie</h3>";
                $html .= $this->categorieController->afficherTousLesCategoriesVueModifierFormation($formation->getListeCategories());
                $html .= "</div>
                          <div class='div5'>
                <h3 class='text'>Prix</h3>
                <input name='modifierFormationPrix' type='text' value='" . $formation->getPrixFormation() . "' required>
                </div>
                <div class='div6'>
                <h3 class='text'>Lieux</h3>";
                $html .= $this->lieuController->afficherTousLesLieuxVueModifierFormation($formation->getListeLieux());
                $html .= "</div><div class='div7'>
                <h3 class='text'>Date début</h3>
                <input name='modifierFormationDateDebut' type='date' value='" . $formation->getDateDebutFormation() . "' required>
                </div>
                <div class='div8'>
                <h3 class='text'>Date fin</h3>
                <input name='modifierFormationDateFin' type='date' value='" . $formation->getDateFinFormation() . "' required>
                </div>
                <div class='div12'>
                <h3 class='text'>Certification</h3>
                <input name='modifierFormationCertification' type='text' value='" . $formation->getCertificationFormation() . "' required>
                </div>
                <div class='div9'>
                <h3 class='text'>Détails</h3>
                <input name='modifierFormationDescription' type='text' value='" . $formation->getDescFormation() . "' required>
                </div>
                <div class='div13'>
                <h3 class='text'>Niveau</h3>
                <input name='modifierFormationNiveau' type='text' value='" . $formation->getNiveauFormation() . "' required>
                </div>
                 <div class='div14'>
                <h3 class='text'>Photo</h3>
                <input name='modifierFormationPhoto' accept='image/png, image/jpg' type='file' value='../images/" . $formation->getPhotoFormation() . "' required>
                </div>
                <div class='div10'>
                    <input class='boutton' type='submit' name='boutonModifierFormation' value='Modifier'>
                </div>
                <div class='div11'>
                    <button class='boutton' type='button' onclick='annulerModification()'>Annuler</button>
                </div>";
                echo $html;
            }
        }

    }

    public function getFormationById($id)
    {
        foreach ($this->listeFormations as $formation) {
            if ($formation->getIdFormation() == $id) {
                $formTrouvee = $formation;
            }
        }
        return $formTrouvee;
    }

    public function supprimerLaFormation($idFormation)
    {
        $this->formationDAO->supprimerUneFormation($idFormation);
    }

    public function modifierLaFormation($titreFormation, $descFormation, $dateDebutFormation, $dateFinFormation, $prixFormation, $certificationFormation, $niveauFormation, $photoFormation, $idFormation)
    {
        if ($photoFormation == null){
            foreach ($this->listeFormations as $formation) {
                if ($formation->getIdFormation() == $idFormation) {
                    $photoFormation = $formation->getPhotoFormation();
                }
            }
        }
        if (filter_var($prixFormation, FILTER_VALIDATE_FLOAT) !== false) {
            $this->formationDAO->modifierUneFormation($titreFormation, $descFormation, $dateDebutFormation, $dateFinFormation, $prixFormation, $certificationFormation, $niveauFormation, $photoFormation, $idFormation);
        } else {
            echo "Le prix de la formation n'est pas un nombre valide.";
        }
    }

    public function ajouterLaFormation($titreFormation, $descFormation, $dateDebutFormation, $dateFinFormation, $prixFormation, $certificationFormation, $niveauFormation, $photoFormation)
    {
        if (filter_var($prixFormation, FILTER_VALIDATE_FLOAT) !== false) {
            $this->formationDAO->ajouterUneFormation($titreFormation, $descFormation, $dateDebutFormation, $dateFinFormation, $prixFormation, $certificationFormation, $niveauFormation, $photoFormation);
        } else {
            echo "Le prix de la formation n'est pas un nombre valide.";
        }
    }
}