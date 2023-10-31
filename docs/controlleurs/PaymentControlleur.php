<?php

namespace controlleurs;

use models\Cart;
use PHPMailer\PHPMailer\PHPMailer;

include_once(__DIR__ . "/../DAO/UtilisateurDAO.php");
include_once(__DIR__ . "/../DAO/FormationDAO.php");
include_once(__DIR__ . "/../DAO/CommandeFormationDAO.php");
class PaymentControlleur
{

    public $formationDAO;
    public $listeFormations;
    public $utilisateurDAO;
    public $commandeDAO;
    public $commandeFormationDAO;
    public $utilisateur;

    function __construct()
    {
        $this->formationDAO = new \formationDAO();
        $this->listeFormations = $this->formationDAO->getToutesLesFormations();
        $this->utilisateurDAO = new \UtilisateurDAO();
        $this->commandeDAO = new \CommandeDAO();
        $this->commandeFormationDAO = new \CommandeFormationDAO();
        $this->utilisateur = $this->utilisateurDAO->getUtilisateurParMail($_SESSION['mail_utilisateur'])[0];
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

    public function confirmationPayement($mailUtilisateur){

        require_once "../vues/phpmailer/Exception.php";
        require_once "../vues/phpmailer/PHPMailer.php";
        require_once "../vues/phpmailer/SMTP.php";

        $html = "";
        $nombreTotFormation = 0;
        $prixTotFormation = 0;
        $listeCommandes = $this->commandeDAO->getToutesLesCommandes();
        foreach ($listeCommandes as $commande){
            if ($commande->getIdCommande() == $this->commandeDAO->getIdMaxCommande()){
                $commandeDef = $commande;
            }
        }
        $html .= "<p>Nous vous remercions chaleureusement de nous avoir choisi pour vos futures formations, et nous sommes impatients de vous accompagner dans votre développement professionnel !</p>
                   <p class='date-commande'>Voici le recapitulatif de votre commande du " . $commandeDef->getDateCommande() ." :</p>
                    <div class='rectangle-historique-commande'>
                <div class='div1'><br>";
        $this->listFormation  = $this->formationDAO->getFormationParCommande($commandeDef->getIdCommande());
        foreach ($this->listFormation as $formation) {
            $prixFormation = 0;
            $nombre = $this->commandeFormationDAO->getParFormationEtCommande($formation->getIdFormation() ,$commandeDef->getIdCommande());
            $prixFormation = $formation->getPrixFormation()*$nombre[0]->getNbFormation();
            $html .= "
                    <div><p>". $formation->getTitreFormation() ."&nbsp;x".$nombre[0]->getNbFormation()."&nbsp;".$prixFormation." euros</p></div><br>";
            $nombreTotFormation += $nombre[0]->getNbFormation();
            $prixTotFormation += $prixFormation;
        }
        $html .="</div>
                <div class='div2'><p class='totaux'>Total articles : " .$nombreTotFormation."</p></div>
                <div class='div4'><p class='totaux'>Montant total : ".$prixTotFormation." euros</p></div>
            </div>";

        $mail = new PHPMailer(true);

        try {
            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = "smtp-mail.outlook.com";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            $mail->Username = "totoleschamps@outlook.fr";
            $mail->Password = "Lolita5300";

            $mail->setFrom("totoleschamps@outlook.fr");
            $mail->addAddress($mailUtilisateur);
            $mail->isHTML(true);
            $mail->Subject = "Confirmation d'incription Arbre du savoir";
            $mail->Body = $html;

            $mail->send();
        }catch(Exception){
            echo "Erreur: {$mail->ErrorInfo}";
        }

    }

}