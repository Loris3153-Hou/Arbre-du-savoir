function annulerSuppression() {
    window.location.pathname = '/arbre-du-savoir/docs/vues/admin.php'
}

function supprimerFormation(idFormation) {
    window.location.href = 'supprimer-produit.php?idFormationASupprimer=' + idFormation;
}