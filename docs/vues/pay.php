<?php

require "../../vendor/autoload.php";
include_once "../models/Cart.php";
include_once "../controlleurs/StripePaymentControlleur.php";
include_once "../controlleurs/PaymentControlleur.php";


session_start();
if (!isset ($_SESSION['mail_utilisateur'])) {
    header('Location: inscriptionAuthentification.php');
}


$cleSecrete = "sk_test_51O4kKGD9ge750uP16mIZ6iPgwgl5LVxPIP1cerErljsVBe2gBSuUlGiPysFG5SARXbEpeoneeUH9xRrYib2EtSBy00IZ2uBddN";
$payment = new \controlleurs\PaymentControlleur();
$cart = new \models\Cart($payment->chargementData());
$payment = new StripePaymentControlleur($cleSecrete);
$payment->startPayment($cart);
