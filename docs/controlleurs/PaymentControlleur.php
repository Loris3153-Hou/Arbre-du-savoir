<?php

namespace controlleurs;

use models\Cart;

include_once(__DIR__ . "/../DAO/FormationDAO.php");
class PaymentControlleur
{

    public $formationDAO;
    public $listeFormations;

    function __construct()
    {
        $this->formationDAO = new \formationDAO();
        $this->listeFormations = $this->formationDAO->getToutesLesFormations();
    }

    function eurosToCentimes($prixEnEuros) {
        // Supprimez les éventuels espaces et remplacez la virgule par un point
        $prixEnEuros = str_replace(',', '.', str_replace(' ', '', $prixEnEuros));

        // Assurez-vous que le prix est un nombre à virgule flottante
        if (!is_numeric($prixEnEuros)) {
            // Gérez ici le cas où le prix n'est pas un nombre valide
            return false;
        }

        // Convertissez le prix en centimes d'euros (en utilisant deux décimales)
        $prixEnCentimes = round($prixEnEuros * 100);

        return $prixEnCentimes;
    }

    public function chargementData(){

        $listeFormation = [];

        for($i = 0; $i < count($_SESSION['listeItemPanier']['idFormation']); $i++) {
            $formationPanier = null; // Initialisez la variable $formationPanier ici

            foreach ($this->listeFormations as $formation) {
                if($_SESSION['listeItemPanier']['idFormation'][$i] == $formation->getIdFormation()){
                    $formationPanier = $formation;
                    break; // Sortez de la boucle dès que la correspondance est trouvée
                }
            }

            if ($formationPanier) {
                $name = $formationPanier->getTitreFormation();
                $quantity = $_SESSION['listeItemPanier']['nbFormation'][$i];
                $price = $formationPanier->getPrixFormation();
                $listeFormation[] = [
                    'name' => $name,
                    'quantity' => $quantity,
                    'price' => $this->eurosToCentimes($price)
                ];
            }
        }

        return $listeFormation;
    }



}