<?php
session_start();

include_once(__DIR__ . "/../DAO/FormationDAO.php");

$formationDAO = new formationDAO();

$success = 1;
$msg = "";

$tableauDesLieux = stringToArray($_POST['tableauLieux']);
$msg = "";

if (!empty($_POST['tableauLieux'])) {

    if (count($tableauDesLieux) == 1) {
        $listeDesFormationsAAfficher = $formationDAO->filtrerParUneVille($tableauDesLieux[0]);
        foreach ($listeDesFormationsAAfficher as $formation) {
            $msg .= "<div class='produit' onclick='goPageDescriptionProduit(" . $formation->getIdFormation() . ")'>
                        <img src='images/" . $formation->getPhotoFormation() . "' alt='" . $formation->getPhotoFormation() . "' width='400' height='220'>
                        <h2>" . $formation->getTitreFormation() . "</h2>
                        <p>Description du produit</p>
                      </div>";
        }
    }
    else{
        $listeDesFormationsAAfficher = $formationDAO->filtrerParPlusieursVilles($tableauDesLieux);
        foreach ($listeDesFormationsAAfficher as $formation) {
            $msg .= "<div class='produit' onclick='goPageDescriptionProduit(" . $formation->getIdFormation() . ")'>
                        <img src='images/" . $formation->getPhotoFormation() . "' alt='" . $formation->getPhotoFormation() . "' width='400' height='220'>
                        <h2>" . $formation->getTitreFormation() . "</h2>
                        <p>Description du produit</p>
                      </div>";
        }
    }
    $success = 1;
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

function stringToArray($inputString) {
    // Utilise la fonction explode() pour séparer le string en un tableau en utilisant la virgule comme délimiteur
    $array = explode(',', $inputString);

    // Retire les espaces superflus autour de chaque élément du tableau en utilisant la fonction array_map() et la fonction trim()
    $array = array_map('trim', $array);

    return $array;
}


$res = ["success" => $success, "msg" => $msg];
echo json_encode($res);