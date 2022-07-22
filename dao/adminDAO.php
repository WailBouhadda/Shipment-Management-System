<?php
  
  require_once("tools/DBconnection.php");

class adminDAO{



   private $DB = null;


    public function adminLogin($email, $password){

            $this->DB = new DBconnection;

            $LoginSQL = "SELECT * FROM admin WHERE email = '".$email."' and password = '".$password."'";
                
            $result = $this->DB->executeSQL($LoginSQL);

            $admin = new admin;

            if($result->num_rows > 0){

                if($row = $result->fetch_assoc()){

                  $admin->setId($row["id"]); 
                  $admin->setNom($row["nom"]);   
                  $admin->setPrenom($row["prenom"]); 
                  $admin->setEmail($row["email"]); 
                  $admin->setPassword($row["password"]); 
                    
                    
                }else{
                    $admin = null;
                }
            }else{
                $admin = null;
        }

        return $admin;
    }



}





?>