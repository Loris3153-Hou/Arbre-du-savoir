function goPageModifierProduit(idFormation) {
    window.location.href = 'modifier-produit.php?idFormation=' + idFormation;
    console.log('Id de formation:', idFormation);
}

function goPageSupprimerProduit(idFormation) {
    window.location.href = 'supprimer-produit.php?idFormation=' + idFormation;
}

function goPageAjouterProduit() {
    window.location.href = 'ajouter-produit.php'
}