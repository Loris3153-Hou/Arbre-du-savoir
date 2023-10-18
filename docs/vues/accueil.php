<?php
session_start(); ?>

<!DOCTYPE html>

    <head>
        <link href="css/accueil.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
    </head>


<?php include("header.php")?>
    <body>

    <!-- **************************************************************************************************** -->


    <!-- **************************************************************************************************** -->
    <div class="body">
    <div id="slider">

        <input type="radio" name="slider" id="slide1" checked>
        <input type="radio" name="slider" id="slide2">
        <input type="radio" name="slider" id="slide3">
        <div id="slider_slides">
            <div id="slider_slides_overflow">
                <div class="slider_slides_overflow_inner">
                    <div class="slide slide_1">
                        <div class="slide-content">
                            <h2>Bienvenue sur l'Arbre du Savoir...</h2>
                        </div>
                    </div>
                    <div class="slide slide_2">
                        <div class="slide-content">
                            <h2>...ici vous treverez un large choix de formations parmis plus de 10 corps de métiers différents...</h2>
                        </div>
                    </div>
                    <div class="slide slide_3">
                        <div class="slide-content">
                            <h2>...et une possibilité de choisir votre lieu de formation parmis une séléction de villes !</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="controls">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
        </div>
        <div id="bullets">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
        </div>
    </div>
    </div>
    <footer>
        <h3>Condition d'utilisation</h3>
        <h3>Date mise à jour</h3>
        <h3>Réseaux sociaux</h3>
    </footer>
    </body>
    <style>
        header {
            position: static;
        }
    </style>
</html>