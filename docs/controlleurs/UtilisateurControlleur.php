<?php

namespace controlleurs;
use PHPMailer\PHPMailer\PHPMailer;

include_once(__DIR__ . "/../DAO/UtilisateurDAO.php");

class UtilisateurControlleur
{
    public $utilisateurDAO;

    public function __construct()
    {
        $this->utilisateurDAO = new \UtilisateurDAO();
    }

    public function authentification($mailUtilisateur){

            $result =  $this->utilisateurDAO->getUtilisateurParMail($mailUtilisateur);
            if (count($result)==1) {
                $hashed = hash("md5", $_POST['passUser']);
                if ($hashed == $result[0]->mdpUtilisateur) {
                    echo "test";
                    session_start();
                    $_SESSION['mail_utilisateur'] = $result[0]->mailUtilisateur;
                    header('Location: index.php');
                }
                else{
                    echo "Mot de passe incorrect !";
                }
            }
        }


    public function inscription($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $dateNaissUtilisateur, $mailUtilisateur, $mdpUtilisateur){


        require_once "../vues/phpmailer/Exception.php";
        require_once "../vues/phpmailer/PHPMailer.php";
        require_once "../vues/phpmailer/SMTP.php";

        $hashedMdpUtilisateur = hash("md5", $mdpUtilisateur);

        $resultMail = $this->utilisateurDAO->getUtilisateurParMail($mailUtilisateur);

        if (count($resultMail)==0) {
            $result = $this->utilisateurDAO->insertUtilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $dateNaissUtilisateur, $mailUtilisateur, $hashedMdpUtilisateur);
          //  $mail = mail('lorishourriere31@outlook.fr', "Vérification mdp", "Bonjour, ceci est un test");
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
                $mail->Body = "<html>
                            <head>
                              <title>Confirmation</title>
                            </head>
                            <body>
                              <p>Cher cleint,</p>
                              <p>Votre compte a bien été créer, veuillez cliquer sur ce bouton afin de vous authentifier :</p>
                              <br>
                              <p>
                                <a href='https://arbre-du-savoir.online/vues/authentification.php' style='background-color: #3498db; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Cliquez ici</a>
                              </p>
                              <p>Merci de lire cet e-mail.</p>
                            </body>
                            </html>";

                $mail->send();
            }catch(Exception){
                echo "Erreur: {$mail->ErrorInfo}";
            }
            if ($mail) echo "Un mail de comfirmation vous a été envoyé."; else echo "Aucun compte ne correspond à cette adresse mail.";

            //session_start();
            //$_SESSION['mail_utilisateur'] = $_POST['mail'];
            header('Location: authentification.php');
        }else {
            echo "Mail deja use";
        }



    }

    public function saisieDonneeModifierProfil(){

        $utilisateur = $this->utilisateurDAO->getUtilisateurParMail($_SESSION['mail_utilisateur']);
        $html = "";
        $html .= "<div class='profilNom'>
                        <h3 class='text'>Nom :</h3>
                        <input type='text' name='nomUtilisateur' value='" . $utilisateur[0]->getNomUtilisateur() . "' required>
                    </div>
                
                    <div class='profilPrenom'>
                        <h3 class='text'>Prénom :</h3>
                        <input type='text' name='prenomUtilisateur' value='" . $utilisateur[0]->getPrenomUtilisateur() . "' required>
                    </div>
                
                    <div class='profilDate'>
                        <h3 class='text'>Date de naissance :</h3>
                        <input type='date' name='dateUtilisateur' value='" . $utilisateur[0]->getDateNaisUtilisateur() . "' required>
                    </div>
                
                    <div class='profilMail'>
                        <h3 class='text'>Adresse mail :</h3>
                        <input type='text' name='mailUtilisateur' value='" . $utilisateur[0]->getMailUtilisateur() . "' required>
                    </div>
                
                    <div class='profilMdp'>
                        <h3 class='text'>Mot de passe oublié ?</h3>
                    </div>
                
                    <div class='profilBouton'>
                        <input class='boutton' type='submit' value='Annuler'>
                        <input class='boutton' type='submit' name='sub' value='Enregistrer'>
                    </div>";

        echo $html;
    }

    public function modifierUtilisateur($nomUtilisateur, $prenomUtilisateur, $dateNaissFormation, $mailUtilisateur)
    {
        $utilisateur = $this->utilisateurDAO->getUtilisateurParMail($_SESSION['mail_utilisateur']);
        $idUtilisateur = $utilisateur[0]->getIdUtilisateur();
        $this->utilisateurDAO->updateUtilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $dateNaissFormation, $mailUtilisateur);

    }

    public function adminUtilisateur($mailUtilisateur)
    {
        $utilisateur = $this->utilisateurDAO->getUtilisateurParMail($mailUtilisateur);
        echo $utilisateur[0]->getAdminUtilisateur();
        $adminUtilisateur = $utilisateur[0]->getAdminUtilisateur();
        return $adminUtilisateur;

    }


}