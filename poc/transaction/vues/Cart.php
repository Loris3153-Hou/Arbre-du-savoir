<?php

class Cart
{
    private $id;
    private $nom;
    private $quantite;
    private $prix;
    private $sessionId;

    /**
     * @param $nom
     * @param $quantite
     * @param $prix
     */
    public function __construct($id, $nom, $quantite, $prix)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->quantite = $quantite;
        $this->prix = $prix;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }/**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
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