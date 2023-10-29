<?php

namespace models;

class Cart
{

    private $sessionId;
    private $products;

    /**
     * @param $products
     */
    public function __construct($products)
    {
        $this->products = $products;
    }


    /**
     * @param mixed $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }


    public function getProducts(){
        return [
            [
                'name' =>'formation en C',
                'price' =>'1500'
            ],
            [
                'name' =>'formation java',
                'price' =>'8000'
            ]
        ];
    }

}