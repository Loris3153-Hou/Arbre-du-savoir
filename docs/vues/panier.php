<?php

session_start();
if(!isset ($_SESSION['mail_utilisateur'])){
    header('Location: authentification.php');
}

?>

<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>Arbre du Savoir</title>
        <link href="css/panier.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">




    </head>
    <body>
        <?php include("header.php")?>

        <div class="parent">
            <div class="panier"> </div>
            <div class="recapitulatif"> </div>
            <div class="texteRecapitulatif">
                <h2>Récapitulatif :</h2>
            </div>
            <div class="nom-produit-quantite-recapitulatif">
                <p>Programmation en C x1</p>
            </div>
            <div class="prix-total-article-recapitulatif">
                <p>152,00$</p>
            </div>
            <div class="texte-total-recapitulatif">
                <h3>Total :</h3>
            </div>
            <div class="prix-total-commande-recapitulatif">
                <h3>456,00$</h3>
            </div>
            <div class="button-paiement-recapitulatif">
                <button id="bouton-paiement">Paiement</button>
            </div>
            <div class="textePanier">
                <h2 id="texte-panier">Panier :</h2>
            </div>
            <div class="description-article-panier">
                <div class="grid-panier">
                    <div class="image-panier">
                        <img id='imagePanier' src='../images/pdt1.jpg' alt='image'>
                    </div>
                    <div class="nom-produit-panier">
                        <p>Programmation en C</p>
                    </div>
                    <div class="prix-panier">
                        <p>152,00$</p>
                    </div>
                    <div class="dates-panier">
                        <p>12/08/2023 - 20-09-2023</p>
                    </div>
                    <div class="niveau-panier">
                        <p>niveau : Bac +2</p>
                    </div>
                    <div class="quantite-panier">
                        <form>
                            <select name="quantite" id="quantite">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </form>
                    </div>
                    <div class="supprimer">
                        <img id='imageSupprimer' src='../images/supprimer.png' alt='image'>
                    </div>
                    <div class="ligne">
                        <hr />
                    </div>
                </div>
                <div class="grid-panier">
                    <div class="image-panier">
                        <img id='imagePanier' src='../images/pdt1.jpg' alt='image'>
                    </div>
                    <div class="nom-produit-panier">
                        <p>Programmation en C</p>
                    </div>
                    <div class="prix-panier">
                        <p>152,00$</p>
                    </div>
                    <div class="dates-panier">
                        <p>12/08/2023 - 20-09-2023</p>
                    </div>
                    <div class="niveau-panier">
                        <p>niveau : Bac +2</p>
                    </div>
                    <div class="quantite-panier">
                        <form>
                            <select name="quantite" id="quantite">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </form>
                    </div>
                    <div class="supprimer">
                        <img id='imageSupprimer' src='../images/supprimer.png' alt='image'>
                    </div>
                    <div class="ligne">
                        <hr />
                    </div>
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
