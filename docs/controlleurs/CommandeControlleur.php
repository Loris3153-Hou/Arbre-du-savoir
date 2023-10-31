<?php

namespace controlleurs;

include_once(__DIR__ . "/../DAO/UtilisateurDAO.php");
include_once(__DIR__ . "/../DAO/FormationDAO.php");
include_once(__DIR__ . "/../DAO/CommandeFormationDAO.php");
include_once(__DIR__ . "/../DAO/CommandeDAO.php");

class CommandeControlleur
{
    public $utilisateurDAO;
    public $formationDAO;
    public $commandeFormationDAO;
    public $commandeDAO;
    public $utilisateur;

    function __construct(){
        $this->utilisateurDAO = new \UtilisateurDAO();
        $this->formationDAO = new \FormationDAO();
        $this->commandeFormationDAO = new \CommandeFormationDAO();
        $this->commandeDAO = new \CommandeDAO();
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

    public function afficherToutesLesCommandes(){
        $html = "";
        $listeCommande = $this->commandeDAO->getToutesLesCommandes();
        foreach ($listeCommande as $commande){
            $nombreTotFormation = 0;
            $prixTotFormation = 0;
            $num_commande = 0;
            foreach ($this->utilisateurDAO->getTousLesUtilisateurs() as $utilisateur){
                if ($utilisateur->getIdUtilisateur() == $commande->getIdUtilisateur()){
                    $utilisateurCommande = $utilisateur;
                }
            }
            $html .= "<p class='date-commande'>" . $commande->getDateCommande() ." &nbsp; &nbsp; &nbsp; ". $utilisateurCommande->getPrenomUtilisateur() ."  ". $utilisateurCommande->getNomUtilisateur() ."</p>
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

    public function ajouterCommandeBDD(){
        $utilisateur = $this->utilisateurDAO->getUtilisateurParMail($_SESSION['mail_utilisateur']);
        $idUtilisateur = $utilisateur[0]->getIdUtilisateur();
        $dateSysteme = date("Y-m-d");
        if(isset($_SESSION['listeItemPanier']['idFormation'])){
            $this->commandeDAO->insertCommande($dateSysteme, $idUtilisateur);
            for($i = 0; $i< count($_SESSION['listeItemPanier']['idFormation']); $i++){
                $this->commandeFormationDAO->insertCommandeFormation($this->commandeDAO->getIdMaxCommande(), $_SESSION['listeItemPanier']['idFormation'][$i], $_SESSION['listeItemPanier']['nbFormation'][$i]);
            }
        }
        unset($_SESSION['listeItemPanier']);
    }

}