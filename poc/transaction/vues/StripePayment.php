<?php

use Stripe\Stripe;
class StripePayment
{
    public function __construct($clientsecret)
    {
        Stripe::setApiKey($clientsecret);
        Stripe::setApiVersion("2023-10-16");
    }

    public function startPayment(Cart $cart){
        $session = \Stripe\Checkout\Session::create([
            'line_items'=>[
                array_map(function (array $product) {
                    return [
                        'quantity' => 1,
                        'price_data' => [
                            'currency' => 'EUR',
                            'product_data' => [
                                'name' => $product['name'],
                            ],
                            'unit_amount' => $product['price']
                        ]
                    ];
                }, $cart->getProducts())
            ],
            'mode' => 'payment',
            'success_url' => 'http://localhost/arbre-du-savoir/poc/transaction/vues/pagePaiementValide.php',
            'cancel_url' => 'http://localhost/arbre-du-savoir/poc/transaction/vues/pagePaiementRefuse.php',
            'billing_address_collection' => 'required',
            'metadata' => [
                'cart_id' =>$cart->getId()
            ]
        ]);
        $cart->setSessionId($session->id);
        header("HTTP/1.1 303 See Other");
        header("Location: " . $session->url);
    }
}