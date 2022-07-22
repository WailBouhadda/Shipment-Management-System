<?php
class vehicule{


    private $id;
    private $type;
    private $note;
    private $autre;
   

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }


    
    public function setType($type){
        $this->type = $type;
    }

    public function getType(){
        return $this->type;
    }


    
    public function setNote($note){
        $this->note = $note;
    }

    public function getNote(){
        return $this->note;
    }



    public function setAutre($autre){
        $this->autre = $autre;
    }

    public function getAutre(){
        return $this->autre;
    }


}


?>