<?php

namespace controlleurs;

include_once(__DIR__ . "/../DAO/CommandeDAO.php");

class CommandeControlleur
{
    public $commandeDAO;
    public $listeCommandes;

    function __construct(){
        $this->commandeDAO = new \CommandeDAO();
        $this->listeCommandes = $this->commandeDAO->getToutesLesCommandes();
    }
/*
    public function afficherToutesLesCommandesParUtilisateur($idUtilisateur){
        $html = "";
        $num_commande = 0;
        foreach ($this->listeCommandes as $commande){
            $num_commande += 1;
            $html .= "<input type='checkbox' id='com". $num_commande ."' name='com-". $commande->getIdCommande() ."'>
                <label for='com". $num_commande ."'>". $commande->getIdCommande() ."</label><br>";
        }
        echo $html;
    }*/

}