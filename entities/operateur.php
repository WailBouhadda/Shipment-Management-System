<?php
class operateur{

    
    private $id;
    private $compteuser;
    private $nom;
    private $prenom;
    private $telephone;
    



    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }


    
    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getNom(){
        return $this->nom;
    }


    
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function getPrenom(){
        return $this->prenom;
    }



    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }

    public function getTelephone(){
        return $this->telephone;
    }



    public function setCompteuser($compteuser){
        $this->compteuser = $compteuser;
    }

    public function getCompteuser(){
        return $this->compteuser;
    }


}
?>