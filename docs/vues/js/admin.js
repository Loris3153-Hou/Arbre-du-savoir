function goPageModifierProduit(idFormation) {
    window.location.href = 'modifier-produit.php?idFormation=' + idFormation;
    console.log('Id de formation:', idFormation);
}

function goPageSupprimerProduit() {
    window.location.pathname = '/arbre-du-savoir/docs/vues/supprimer-produit.php'
}

function goPageAjouterProduit() {
    window.location.pathname = '/arbre-du-savoir/docs/vues/ajouter-produit.php'
}