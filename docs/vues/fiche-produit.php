<?php
include(__DIR__."/../controlleurs/FormationControlleur.php");
$formationControlleur = new \controlleurs\FormationControlleur();
$formation = $formationControlleur->getFormationById($_COOKIE['id']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Fiche Produit</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/fiche-produit.css">
        <link rel="stylesheet" href="css/menu.css">
    </head>
    <body>
        <?php include("header.php")?>
        <div class="parent">
            <div class = "titre_formation">
                <h1 id="titre-formation">
                    <?php echo $formation->getTitreFormation() ?>
                </h1>
            </div>
            <div class="photo_formation">
                <?php
                echo "<img id='imageFormation' src='../images/" . $formation->getPhotoFormation() . "' alt='" . $formation->getPhotoFormation() . "'>";
                ?>
            </div>
            <div class="prix_formation">
                <h2 class = "informationPrixDates" id = "prix">
                    <?php echo $formation->getPrixFormation()?>
                    $
                </h2>
                <div class = "dates">
                    <h3 class = "dateDeLaFormation informationPrixDates" id = "dateDeDebut">
                        <?php echo $formation->getDateDebutFormation()?>
                    </h3>
                    <h3 class = "dateDeLaFormation informationPrixDates" id = "dateDeFin">
                        <?php echo $formation->getDateFinFormation()?>
                    </h3>
                </div>
            </div>
            <div class="duree_formation">
                <h3 id = "duree">Durée :
                    <?php
                    $dateDebut = new DateTime($formation->getDateDebutFormation());
                    $dateFin = new DateTime($formation->getDateFinFormation());
                    $diff = $dateFin->diff($dateDebut);
                    $nombreDeJours = $diff->days;
                    echo $nombreDeJours . " jours";
                    ?>
                </h3>
            </div>
            <div class="cerification_formation">
                <div id="certification">
                    <h3>Niveau :
                        <?php echo $formation->getNiveauFormation()?>
                    </h3>

                </div>
            </div>
            <div class="lieu_formation">
                <form>
                    <label for="ville">Ville :</label>
                    <select name="ville" id="ville">
                        <?php
                        $html = "";
                        foreach($formation->getListeLieux() as $lieu){
                            $html .= '<option value="'.$lieu->getVilleLieu().'">'.$lieu->getVilleLieu().'</option>';
                        }
                        echo $html;
                        ?>
                    </select>
                </form>
            </div>
            <div class="quantite_formation">
                <form>
                    <label for="quantite">Quantité :</label>
                    <select name="quantite" id="quantite">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </form>
            </div>
            <div class="div7">
            </div>
            <div class="description_formation">
                <div id = "description">
                    <h4>Description : </h4>
                    <p id = "texteDescription">
                        <?php echo $formation->getDescFormation()?>
                    </p>
                </div>
            </div>
            <div class="div9"> </div>
            <div class="ajouterAuPanier_formation">
                <div id = "ajouterAuPanier">
                    <h3>AJOUTER AU PANIER</h3>
                </div>
            </div>
        </div>
        <footer>
            <h3>Condition d'utilisation</h3>
            <h3>Date mise à jour</h3>
            <h3>Réseaux sociaux</h3>
        </footer>
    </body>
</html>