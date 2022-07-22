<?php

class transportateur{

    private $id;
    private $societe;
    private $adress;
    private $telephone;
    private $fax;
    private $email;
    private $pcontacter;
    private $tcontacter;
    private $econtacter;
    private $ville;
    private $autre;


    
    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }


    
    public function setSociete($societe){
        $this->societe = $societe;
    }

    public function getSociete(){
        return $this->societe;
    }


    
    public function setAdress($adress){
        $this->adress = $adress;
    }

    public function getAdress(){
        return $this->adress;
    }



    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }

    public function getTelephone(){
        return $this->telephone;
    }



    public function setFax($fax){
        $this->fax = $fax;
    }

    public function getFax(){
        return $this->fax;
    }



    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }



    public function setPcontacter($pcontacter){
        $this->pcontacter = $pcontacter;
    }

    public function getPcontacter(){
        return $this->pcontacter;
    }


    
    public function setTcontacter($tcontacter){
        $this->tcontacter = $tcontacter;
    }

    public function getTcontacter(){
        return $this->tcontacter;
    }


    
    public function setEcontacter($econtacter){
        $this->econtacter = $econtacter;
    }

    public function getEcontacter(){
        return $this->econtacter;
    }



    public function setVille($ville){
        $this->ville = $ville;
    }

    public function getVille(){
        return $this->ville;
    }



    public function setAutre($autre){
        $this->autre = $autre;
    }

    public function getAutre(){
        return $this->autre;
    }


}

?>