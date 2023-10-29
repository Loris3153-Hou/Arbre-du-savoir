<?php
require "../../../vendor/autoload.php";
include_once "Cart.php";
include_once "StripePayment.php";

$cleSecrete = "sk_test_51O4kKGD9ge750uP16mIZ6iPgwgl5LVxPIP1cerErljsVBe2gBSuUlGiPysFG5SARXbEpeoneeUH9xRrYib2EtSBy00IZ2uBddN";
echo $_SESSION['listeItemPanier'];
/*$cart = new Cart("formation en C", 2, 1, 8000);
$payment = new StripePayment($cleSecrete);
$payment->startPayment($cart);*/