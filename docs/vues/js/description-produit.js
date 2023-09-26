function goPageDescriptionProduit(id) {
    document.cookie = "id = " + id
    window.location.href = 'fiche-produit.php'
}