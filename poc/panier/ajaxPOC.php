<?php

include_once(__DIR__ . "/../../docs/DAO/FormationDAO.php");

$success = 0;
$msg = "Une erreur est survenue (ajaxPOC.php)";
$nouveauSousTotal = [];
$nomFormation = [];

if (!empty($_POST['idFormation']) AND !empty($_POST['nouveauNbFormation'])) {
    $idFormation = htmlspecialchars(strip_tags($_POST['idFormation']));
    $nouveauNbFormation = htmlspecialchars(strip_tags($_POST['nouveauNbFormation']));

    $formationDAO = new formationDAO();
    $formation = $formationDAO->getFormationParId($idFormation)[0];
    $prixFormation = $formation->getPrixFormation();
    $nouveauSousTotalFormation = $prixFormation * $nouveauNbFormation;
    $nouveauSousTotal = $nouveauSousTotalFormation;
    $nomFormation = $formation->getTitreFormation();

    $success = 1;
    $msg = "";
} else {
    $msg = "Les elements n'ont pas ete passes en parametre de la requete";
}


$res = ["success" => $success, "msg" => $msg, "nouveauSousTotal" => $nouveauSousTotal, "nomFormation" => $nomFormation];
echo json_encode($res);

?>