<?php
require "vendor/autoload.php";
$cleSecrete = "sk_test_51O4kKGD9ge750uP16mIZ6iPgwgl5LVxPIP1cerErljsVBe2gBSuUlGiPysFG5SARXbEpeoneeUH9xRrYib2EtSBy00IZ2uBddN";
$cart = new Cart("formation en C", 2, 50);
$payment = new StripePayment($cleSecrete);
$payment->startPayment($cart);