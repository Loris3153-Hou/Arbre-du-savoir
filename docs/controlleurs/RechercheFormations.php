<?php


include_once(__DIR__ . "/../DAO/FormationDAO.php");

$formationDAO = new formationDAO();

$html = "";
$listeDesFormationsAAfficher = $formationDAO->getFormationParValeurDEntree($_REQUEST["value"]);

foreach ($listeDesFormationsAAfficher as $formation) {
    $html .= "<div class='produit' onclick='goPageDescriptionProduit(" . $formation->getIdFormation() . ")'>
                        <img src='../images/" . $formation->getPhotoFormation() . "' alt='" . $formation->getPhotoFormation() . "' width='400' height='220'>
                        <h2>" . $formation->getTitreFormation() . "</h2>
                        <p>Description du produit</p>
                      </div>";
}

echo $html;

?>

