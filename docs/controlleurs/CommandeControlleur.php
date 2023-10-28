<?php

namespace controlleurs;

include_once(__DIR__ . "/../DAO/UtilisateurDAO.php");
include_once(__DIR__ . "/../DAO/FormationDAO.php");
include_once(__DIR__ . "/../DAO/CommandeFormationDAO.php");

class CommandeControlleur
{
    public $utilisateurDAO;
    public $formationDAO;
    public $commandeFormationDAO;
    public $utilisateur;

    function __construct(){
        $this->utilisateurDAO = new \UtilisateurDAO();
        $this->formationDAO = new \FormationDAO();
        $this->commandeFormationDAO = new \CommandeFormationDAO();
        $this->utilisateur = $this->utilisateurDAO->getUtilisateurParMail($_SESSION['mail_utilisateur'])[0];
    }

    public function afficherToutesLesCommandesParUtilisateur(){
        $html = "";
        $listeCommande= $this->utilisateur->getListeCommandes();
        foreach ($listeCommande as $commande){
            $nombreTotFormation = 0;
            $prixTotFormation = 0;
            $num_commande = 0;
            $html .= "<p class='date-commande'>" . $commande->getDateCommande() ." </p>
                        <div class='rectangle-historique-commande'>
                    <div class='div1'>";
            $this->listFormation  = $this->formationDAO->getFormationParCommande($commande->getIdCommande());
            foreach ($this->listFormation as $formation) {
                $prixFormation = 0;
                $nombre = $this->commandeFormationDAO->getParFormationEtCommande($formation->getIdFormation() ,$commande->getIdCommande());
                $prixFormation = $formation->getPrixFormation()*$nombre[0]->getNbFormation();
                $num_commande += 1;
                $html .= "
                        <div class='div".$num_commande."2'><p>". $formation->getTitreFormation() ."</p></div>";
                $num_commande += 1;
                $html .= "
                        <div class='div".$num_commande."2'><p>X".$nombre[0]->getNbFormation()."</p></div>";
                $num_commande += 1;
                $html .= "
                        <div class='div".$num_commande."2'><p>".$prixFormation."</p></div>";
                $nombreTotFormation += $nombre[0]->getNbFormation();
                $prixTotFormation += $prixFormation;
            }
            $html .="</div>
                    <div class='div2'><p class='totaux'>Total articles</p></div>
                    <div class='div3'><p class='totaux'>" .$nombreTotFormation."</p></div>
                    <div class='div4'><p class='totaux'>Montant total</p></div>
                    <div class='div5'><p class='totaux'>".$prixTotFormation."</p></div>
                </div>";
        }

        echo $html;
    }

}