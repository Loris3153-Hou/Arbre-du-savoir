<head>
    <meta charset="utf-8">
    <link href="css/general.css" rel="stylesheet">
    <script src="js/acceuil.js"></script>
    <script src="js/panier.js"></script>
</head>
<body>
    <header>
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>

            <ul class="menu__box">
                <?php
                if(!isset($_SESSION['admin_utilisateur'])){
                    echo '<li><a class="menu__item" href="index.php">Acceuil</a></li>
                    <li><a class="menu__item" href="inscriptionAuthentification.php">Authentification-Inscription</a></li>';
                }
                elseif ($_SESSION['admin_utilisateur'] == 1){
                    echo '<li><a class="menu__item" href="index.php">Acceuil</a></li>
                    <li><a class="menu__item" href="admin.php">Administrateur</a></li>
                    <li><a class="menu__item" href="historique-commandes-admin.php">Histotique des commandes</a></li>';
                }else{
                    echo '<li><a class="menu__item" href="index.php">Acceuil</a></li>
                    <li><a class="menu__item" href="liste-produit.php">Liste Des Produits</a></li>
                    <li><a class="menu__item" href="panier.php">Panier</a></li>
                    <li><a class="menu__item" href="modifierProfil.php">Profil</a></li>
                    <li><a class="menu__item" href="historique-commandes.php">Histotique des commandes</a></li>';
                }
                ?>

            </ul>
        </div>
        <?php
            echo "<a href='inscriptionAuthentification.php'>Deconnexion</a>";
        ?>
        <h1 onclick="goPageAccueil()">Arbre du Savoir</h1>
        <img onclick="goPagePanier()" src='images/panier.png' alt='Panier' width='70px' height='70px'>
        <img onclick="goPageAccueil()" src='images/logo.png' alt='Arbre du savoir' width='90px' height='80px'>
    </header>
</body>

