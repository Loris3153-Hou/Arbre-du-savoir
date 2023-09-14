<?php

?>
<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>Liste des produits</title>
        <link href="liste-produit.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src='img/hamb.png' alt='Programmer en C' width='90px' height='80px'>
            <h1>Arbre du Savoir</h1>
            <img src='img/logo.png' alt='Programmer en C' width='90px' height='80px'>
        </header>
        <div class='body'>
            <div class='rech'>
                <input type='text' name='search' placeholder='Recherche..'>
                <input type='submit' name='submit' 
                class='submit' value='Rechercher'>
            </div>
            <div class='tri'>
                <h2>Trier par :</h2>
                <select>
                    <option value='prixC'>Prix croissant</option>
                    <option value='prixD'>Prix decroissant</option>
                </select>
            </div>
            <div class='filtre'>
                <h2>Filtres</h2>
                <h3>Catégorie d’activité :</h3>
                <input type='checkbox' id='sous-cat1' name='Informatique'>
                <label for='sous-cat1'>Informatique</label><br>
                <input type='checkbox' id='sous-cat2' name='Marketing'>
                <label for='sous-cat2'>Marketing</label><br>
                <input type='checkbox' id='sous-cat2' name='Management'>
                <label for='sous-cat2'>Management</label><br>
                <h3>Lieux :</h3>
                <input type='checkbox' id='sous-cat1' name='Rennes'>
                <label for='sous-cat1'>Rennes</label><br>
                <input type='checkbox' id='sous-cat2' name='Paris'>
                <label for='sous-cat2'>Paris</label><br>
                <input type='checkbox' id='sous-cat1' name='Montréal'>
                <label for='sous-cat1'>Montréal</label><br>
                <input type='checkbox' id='sous-cat2' name='Distanciel'>
                <label for='sous-cat2'>Distanciel</label><br>
            </div>
            
            <div class='produits'>
                <div class='produit'>
                    <img src='img/pdt1.jpg' alt='Marketing Digital Avancé' width='400' height='220'> 
                    <h2>Marketing Digital Avancé</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='img/pdt2.jpg' alt='Développement Web Full-Stack' width='400' height='220'> 
                    <h2>Développement Web Full-Stack</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='img/pdt3.jpg' alt='Leadership et Gestion d Équipe' width='400' height='220'> 
                    <h2>Leadership et Gestion d'Équipe</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='img/pdt4.jpg' alt='Développement d Applications Mobiles' width='400' height='220'> 
                    <h2>Développement d'Applications Mobiles</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='img/pdt5.jpg' alt='Marketing des Réseaux Sociaux' width='400' height='220'> 
                    <h2>Marketing des Réseaux Sociaux</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='img/pdt6.jpg' alt='Cybersécurité et Protection des Données' width='400' height='220'> 
                    <h2>Cybersécurité et Protection des Données</h2>
                    <p>Description du produit</p>
                </div>

                <div class='produit'>
                    <img src='img/pdt7.jpg' alt='Gestion de Projet Agile' width='400' height='220'> 
                    <h2>Gestion de Projet Agile</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='img/pdt8.jpg' alt='Leadership Stratégique' width='400' height='220'> 
                    <h2>Leadership Stratégique</h2>
                    <p>Description du produit</p>
                </div>
                
                <div class='produit'>
                    <img src='img/test.jpg' alt='Programmer en C' width='400' height='220'> 
                    <h2>Programmer en C</h2>
                    <p>Description du produit</p>
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
