<head>
    <meta charset="utf-8">
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
                <li><a class="menu__item" href="accueil.php">Acceuil</a></li>
                <li><a class="menu__item" href="liste-produit.php">Liste Des Produits</a></li>
                <li><a class="menu__item" href="admin.php">Administrateur</a></li>
                <li><a class="menu__item" href="panier.php">Panier</a></li>
                <li><a class="menu__item" href="modifierProfil.php">Profil</a></li>
            </ul>
        </div>
        <?php
            echo "<a href='authentification.php'>Deconnection</a>";
        ?>
        <h1 onclick="goPageAccueil()">Arbre du Savoir</h1>
        <img onclick="goPagePanier()" src='../images/panier.png' alt='Panier' width='70px' height='70px'>
        <img onclick="goPageAccueil()" src='../images/logo.png' alt='Arbre du savoir' width='90px' height='80px'>
    </header>
</body>

