<?php

namespace models;

class Cart
{

    private $sessionId;
    private $products;
    private $id;

    /**
     * @param $products
     */
    public function __construct($products)
    {
        $this->products = $products;
        $this->id = 0;
    }


    /**
     * @param mixed $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products): void
    {
        $this->products = $products;
    }

    public function getId(): int
    {
        return $this->id;
    }





}