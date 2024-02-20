function annulerSuppression() {
    window.location.href = 'admin.php'
}

function supprimerFormation(idFormation) {
    window.location.href = 'supprimer-produit.php?idFormationASupprimer=' + idFormation;
}