function goPageDescriptionProduit(id) {
    document.cookie = "id = " + id
    window.location.pathname = '/arbre-du-savoir/docs/vues/fiche-produit.php'
}