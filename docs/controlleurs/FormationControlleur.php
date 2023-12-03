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
                            <p class='produit-info item'>" . $formation->getPrixFormation() . "€</p>
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

    public function afficherLesFormationsSelectionneesPagePanier(){
        if (isset($_SESSION['listeItemPanier']['idFormation'])){
            for($i = 0; $i < count($_SESSION['listeItemPanier']['idFormation']); $i++){
                foreach ($this->listeFormations as $formation) {
                    if($_SESSION['listeItemPanier']['idFormation'][$i] == $formation->getIdFormation()){
                        $formationPanier = $formation;
                    }
                }
                echo "
            <div class='grid-panier'>
                    <div class='image-panier'>
                        <img id='imagePanier' src='../images/". $formationPanier->getPhotoFormation() ."' alt='image'>
                    </div>
                    <div class='nom-produit-panier'>
                        <p>". $formationPanier->getTitreFormation() ."</p>
                    </div>
                    <div class='prix-panier'>
                        <p>". $formationPanier->getPrixFormation() ." €</p>
                    </div>
                    <div class='dates-panier'>
                        <p>". $formationPanier->getDateDebutFormation() ." - ". $formationPanier->getDateFinFormation() ."</p>
                    </div>
                    <div class='niveau-panier'>
                        <p>niveau : ". $formationPanier->getNiveauFormation() ."</p>
                    </div>
                    <div class='quantite-panier'>
                        <form>
                            <select name='quantite' id=". $formationPanier->getIdFormation() ." onchange='modifierNombreFormation(this)'>
                                <option value='". $_SESSION['listeItemPanier']['nbFormation'][$i] ."'>". $_SESSION['listeItemPanier']['nbFormation'][$i] ."</option>
                                ";
                foreach (array(1, 2, 3, 4) as $quantite){
                    if($quantite != $_SESSION['listeItemPanier']['nbFormation'][$i]){
                        echo "<option value='$quantite'>$quantite</option>";
                    }
                }
                echo "
                            </select>
                            <select name='ville' id='ville'>
                                <option value='". $_SESSION['listeItemPanier']['villeFormation'][$i] ."'>". $_SESSION['listeItemPanier']['villeFormation'][$i] ."</option>
                                ";
                foreach ($formationPanier->getListeLieux() as $lieu){
                    if($lieu->getVilleLieu() != $_SESSION['listeItemPanier']['villeFormation'][$i]){
                        echo "<option value='".$lieu->getVilleLieu()."'>".$lieu->getVilleLieu()."</option>";
                    }
                }
                echo "
                            </select>
                        </form>
                    </div>
                    <div class='supprimer'>
                        <img id='imageSupprimer' src='../images/supprimer.png' alt='image'>
                    </div>
                    <div class='ligne'>
                        <hr />
                    </div>
                </div>
            
            ";
            }
        }
    }

    public function afficherRecapitulatifFormationsPanier(){
        $total = 0;
        if (isset($_SESSION['listeItemPanier']['idFormation'])){
            echo "<div class='nom-produit-quantite-recapitulatif'>";
            for($i = 0; $i < count($_SESSION['listeItemPanier']['idFormation']); $i++){
                foreach ($this->listeFormations as $formation) {
                    if($_SESSION['listeItemPanier']['idFormation'][$i] == $formation->getIdFormation()){
                        $formationPanier = $formation;
                    }
                }
                echo "<p id=".$formationPanier->getIdFormation().$formationPanier->getIdFormation().$formationPanier->getIdFormation().">".$formationPanier->getTitreFormation()." x". $_SESSION['listeItemPanier']['nbFormation'][$i] ."</p>";
            }
            echo "</div>
                <div class='prix-total-article-recapitulatif'>";
            for($i = 0; $i < count($_SESSION['listeItemPanier']['idFormation']); $i++){
                foreach ($this->listeFormations as $formation) {
                    if($_SESSION['listeItemPanier']['idFormation'][$i] == $formation->getIdFormation()){
                        $formationPanier = $formation;
                    }
                }
                echo "<p id=".$formationPanier->getIdFormation().$formationPanier->getIdFormation()." class='sous-total-commande'>". $formationPanier->getPrixFormation() * $_SESSION['listeItemPanier']['nbFormation'][$i] ." €</p>";
                $total +=  $formationPanier->getPrixFormation() * $_SESSION['listeItemPanier']['nbFormation'][$i];
            }
            echo "</div>
                <div class='texte-total-recapitulatif'>
                    <h3>Total :</h3>
                </div>
                <div class='prix-total-commande-recapitulatif'>
                    <h3 id='totalCommande'>$total €</h3>
                </div>";
        }
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

    public function getFormationById($id) {
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

    public function ajouterLaformationAuPanier($formation, $nbFormation, $villeFormation){
        if(!isset($_SESSION['listeItemPanier']['idFormation']) && !isset($_SESSION['listeItemPanier']['nbFormation']) && !isset($_SESSION['listeItemPanier']['villeFormation'])){
            $_SESSION['listeItemPanier']['idFormation'] = array();
            $_SESSION['listeItemPanier']['nbFormation'] = array();
            $_SESSION['listeItemPanier']['villeFormation'] = array();
        }
        array_push($_SESSION['listeItemPanier']['idFormation'], $formation->getIdFormation());
        array_push($_SESSION['listeItemPanier']['nbFormation'], $nbFormation);
        array_push($_SESSION['listeItemPanier']['villeFormation'], $villeFormation);
    }

}
