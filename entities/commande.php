<?php

class commande{

    private $id;
    private $client;
    private $transportateur;
    private $depart;
    private $destination;
    private $vehicule;
    private $operateur;
    private $Noperation;
    private $NBC;
    private $datecommande;
    private $datelivraison;
    private $prixfacturee;
    private $prixttc;
    private $prixtransport;
    private $note;

    
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }


    
    public function setClient($client){
        $this->client = $client;
    }

    public function getClient(){
        return $this->client;
    }


    
    public function setTransportateur($transportateur){
        $this->transportateur = $transportateur;
    }

    public function getTransportateur(){
        return $this->transportateur;
    }



    public function setDepart($depart){
        $this->depart = $depart;
    }

    public function getDepart(){
        return $this->depart;
    }



    public function setDestination($destination){
        $this->destination = $destination;
    }

    public function getDestination(){
        return $this->destination;
    }



    public function setVehicule($vehicule){
        $this->vehicule = $vehicule;
    }

    public function getVehicule(){
        return $this->vehicule;
    }



    public function setOperateur($operateur){
        $this->operateur = $operateur;
    }

    public function getOperateur(){
        return $this->operateur;
    }


    
    public function setNoperation($Noperation){
        $this->Noperation = $Noperation;
    }

    public function getNoperation(){
        return $this->Noperation;
    }


    
    public function setNBC($NBC){
        $this->NBC = $NBC;
    }

    public function getNBC(){
        return $this->NBC;
    }



    public function setDatecommande($datecommande){
        $this->datecommande = $datecommande;
    }

    public function getDatecommande(){
        return $this->datecommande;
    }



    public function setDatelivraison($datelivraison){
        $this->datelivraison = $datelivraison;
    }

    public function getDatelivraison(){
        return $this->datelivraison;
    }


    public function setPrixfacturee($prixfacturee){
        $this->prixfacturee = $prixfacturee;
    }

    public function getPrixfacturee(){
        return $this->prixfacturee;
    }



    public function setPrixttc($prixttc){
        $this->prixttc = $prixttc;
    }

    public function getPrixttc(){
        return $this->prixttc;
    }



    public function setPrixtransport($prixtransport){
        $this->prixtransport = $prixtransport;
    }

    public function getPrixtransport(){
        return $this->prixtransport;
    }



    public function setNote($note){
        $this->note = $note;
    }

    public function getNote(){
        return $this->note;
    }




}

?>