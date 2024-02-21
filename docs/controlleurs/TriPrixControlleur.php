<?php
session_start();

include_once(__DIR__ . "/../DAO/FormationDAO.php");

$formationDAO = new formationDAO();

$success = 0;
$msg = "";

if (!empty($_POST['ChoixTri'])){
    if($_POST['ChoixTri'] == "prixC"){
        $listeDesFormationsAAfficher = $formationDAO->tierParPrixCroissant();
        foreach ($listeDesFormationsAAfficher as $formation) {
            $msg .= "<div class='produit' onclick='goPageDescriptionProduit(" . $formation->getIdFormation() . ")'>
                        <img src='images/" . $formation->getPhotoFormation() . "' alt='" . $formation->getPhotoFormation() . "' width='400' height='220'>
                        <h2>" . $formation->getTitreFormation() . "</h2>
                        <p>Description du produit</p>
                      </div>";
        }
    }
    else if($_POST['ChoixTri'] == "prixD"){
        $listeDesFormationsAAfficher = $formationDAO->tierParPrixDecroissant();
        foreach ($listeDesFormationsAAfficher as $formation) {
            $msg .= "<div class='produit' onclick='goPageDescriptionProduit(" . $formation->getIdFormation() . ")'>
                        <img src='images/" . $formation->getPhotoFormation() . "' alt='" . $formation->getPhotoFormation() . "' width='400' height='220'>
                        <h2>" . $formation->getTitreFormation() . "</h2>
                        <p>Description du produit</p>
                      </div>";
        }
    }
    else{
        $listeDesFormationsAAfficher = $formationDAO->getToutesLesFormations();
        foreach ($listeDesFormationsAAfficher as $formation) {
            $msg .= "<div class='produit' onclick='goPageDescriptionProduit(" . $formation->getIdFormation() . ")'>
                        <img src='images/" . $formation->getPhotoFormation() . "' alt='" . $formation->getPhotoFormation() . "' width='400' height='220'>
                        <h2>" . $formation->getTitreFormation() . "</h2>
                        <p>Description du produit</p>
                      </div>";
        }
    }

    //$msg = $_POST['ChoixTri'];
    $success = 1;
}

$res = ["success" => $success, "msg" => $msg];
echo json_encode($res);