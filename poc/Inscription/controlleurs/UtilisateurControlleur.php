<?php

namespace controlleurs;
use controlleurs\Exception;
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
                    header('Location: accueil.php');
                }
            }
        }


    public function inscription($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $dateNaissUtilisateur, $mailUtilisateur, $mdpUtilisateur){


        require_once "../vues/phpmailer/Exception.php";
        require_once "../vues/phpmailer/PHPMailer.php";
        require_once "../vues/phpmailer/SMTP.php";


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
                                <a href='http://localhost/arbre-du-savoir/poc/Inscription/vues/authentification.php' style='background-color: #3498db; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Cliquez ici</a>
                              </p>
                              <p>Merci de lire cet e-mail.</p>
                            </body>
                            </html>";

            $mail->send();
        }catch(Exception){
            echo "Erreur: {$mail->ErrorInfo}";
        }

        $hashedMdpUtilisateur = hash("md5", $mdpUtilisateur);

        $resultMail = $this->utilisateurDAO->getUtilisateurParMail($mailUtilisateur);

        /*$smtp_server = 'smtp.live.com'; // Remplacez par le serveur SMTP d'OVH
        $smtp_username = 'lorishourriere31@outlook.fr'; // Votre nom d'utilisateur SMTP
        $smtp_password = 'Bhq721hn'; // Votre mot de passe SMTP
        $smtp_port = 465; // Port SMTP d'OVH (peut varier, vérifiez la documentation d'OVH)
        $smtp_auth = true;*/

        if (count($resultMail)==0) {
            $result = $this->utilisateurDAO->insertUtilisateur($idUtilisateur, $nomUtilisateur, $prenomUtilisateur, $dateNaissUtilisateur, $mailUtilisateur, $hashedMdpUtilisateur);
          //  $mail = mail('lorishourriere31@outlook.fr', "Vérification mdp", "Bonjour, ceci est un test");

            if ($mail) echo "Un mail de réinitialisation du mot de passe vous a été envoyé."; else echo "Aucun compte ne correspond à cette adresse mail.";

            //session_start();
            //$_SESSION['mail_utilisateur'] = $_POST['mail'];
        }else {
            echo "deja use";
        }

        //header('Location: authentification.php');

    }


}