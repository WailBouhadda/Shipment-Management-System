<?php 

class DBconnection{


private $conn = null;

 public function connect(){

  //$conn = new mysqli("sql107.epizy.com","epiz_32192946","wGcGi1qJu7QKjMB","epiz_32192946_shipmentmanagement");
  $conn = new mysqli("localhost","root","","shipmentmanagement");

  if ($conn->connect_error) {

    die("Connection failed: " . mysqli_connect_error());

  }

  return $conn;
 }


 public function executeSQL($sql){

  $con = $this->connect();
  $result = $con->query($sql);

  return $result;
}

}


?>