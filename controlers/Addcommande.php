<?php

require_once("../tools/DBconnection.php");
require("../entities/admin.php");
require("../entities/operation.php");
require("../entities/vehicule.php");
require("../entities/client.php");
require("../entities/operateur.php");
require("../entities/depart.php");
require("../entities/destination.php");
require("../entities/transportateur.php");
require("../entities/commande.php");



$DB = new DBconnection;


if(isset($_POST['Ajouter'])){

    $client = new client;
    $transporatteur = new transportateur;
    $depart = new depart;
    $destination = new destination;
    $operateur = new operateur;
    $operation = new operation;
    $vehicule = new vehicule;


    $idClient = null;
    $idTransportateur = null;
    $idDepart = null;
    $idDestination = null;
    $idOperateur = null;


    $action = $_POST['Ajouter'];
  
    if($action === "Commande"){


  
      /* Client */
  
      $insertClient = "INSERT INTO client(SOCIETE, ADRESSE, TELEPHONE, FAX, EMAIL, PERSONNE_CONTACTER, TELEPHONE_CONTACTER, EMAIL_CONTACTER, VILLE, AUTRE) 
      VALUES('".$_POST['SocieteClient']."','".$_POST['AdresseClient']."','".$_POST['TelephoneClient']."','".$_POST['FaxClient']."','".$_POST['EmailClient']."'
      ,'".$_POST['PersonneContacterClient']."','".$_POST['TelephoneContacterClient']."','".$_POST['EmailContacterClient']."','".$_POST['VilleClient']."','".$_POST['AutreClient']."')";
  
      $res += $DB->executeSQL($insertClient);

      $selectClient = "SELECT IDCLIENT from client WHERE SOCIETE = '".$_POST['SocieteClient']."' AND PERSONNE_CONTACTER = '".$_POST['PersonneContacterClient']."'";

      $resultselectClient = $DB->executeSQL($selectClient);

      if($resultselectClient->num_rows > 0){
        if($row = $resultselectClient->fetch_assoc()){
          $idClient = $row["IDCLIENT"]; 
        }
    }
      /* /.Client */
      /* Transportateur */
  
      $insertTransportateur = "INSERT INTO transportateur(SOCIETE, ADRESSE, TELEPHONE, FAX, EMAIL, PERSONNE_CONTACTER, TELEPHONE_CONTACTER, EMAIL_CONTACTER, VILLE, AUTRE) 
      VALUES('".$_POST['SocieteTransportateur']."','".$_POST['AdresseTransportateur']."','".$_POST['TelephoneTransportateur']."','".$_POST['FaxTransportateur']."','".$_POST['EmailTransportateur']."'
      ,'".$_POST['PersonneContacterTransportateur']."','".$_POST['TelephoneContacterTransportateur']."','".$_POST['EmailContacterTransportateur']."','".$_POST['VilleTransportateur']."','".$_POST['AutreTransportateur']."')";
  
      $res += $DB->executeSQL($insertTransportateur);

      $selectTransportateur = "SELECT IDTRANSPORTATEUR from transportateur WHERE SOCIETE = '".$_POST['SocieteTransportateur']."' AND PERSONNE_CONTACTER = '".$_POST['PersonneContacterTransportateur']."'";

      $resultselectTransportateur = $DB->executeSQL($selectTransportateur);

      if($resultselectTransportateur->num_rows > 0){
        if($row = $resultselectTransportateur->fetch_assoc()){
          $idTransportateur = $row["IDTRANSPORTATEUR"]; 
        }
    }
  
      /* /.Transportateur */
      /* Depart */
  
      $insertDepart = "INSERT INTO depart(SOCIETE, ADRESSE, TELEPHONE, FAX, EMAIL, PERSONNE_CONTACTER, TELEPHONE_CONTACTER, EMAIL_CONTACTER, VILLE, AUTRE) 
      VALUES('".$_POST['SocieteDepart']."','".$_POST['AdresseDepart']."','".$_POST['TelephoneDepart']."','".$_POST['FaxDepart']."','".$_POST['EmailDepart']."'
      ,'".$_POST['PersonneContacterDepart']."','".$_POST['TelephoneContacterDepart']."','".$_POST['EmailContacterDepart']."','".$_POST['VilleDepart']."','".$_POST['AutreDepart']."')";
  
      $res += $DB->executeSQL($insertDepart);

      $selectDepart = "SELECT IDDEPART from depart WHERE SOCIETE = '".$_POST['SocieteDepart']."' AND PERSONNE_CONTACTER = '".$_POST['PersonneContacterDepart']."'";

      $resultselectDepart =  $DB->executeSQL($selectDepart);

      if($resultselectDepart->num_rows > 0){
        if($row = $resultselectDepart->fetch_assoc()){
          $idDepart = $row["IDDEPART"]; 
        }
    }
  
  
      /* /.Depart */
      /* Destination */
  
      $insertDestination = "INSERT INTO destination(SOCIETE, ADRESSE, TELEPHONE, FAX, EMAIL, PERSONNE_CONTACTER, TELEPHONE_CONTACTER, EMAIL_CONTACTER, VILLE, AUTRE) 
      VALUES('".$_POST['SocieteDestination']."','".$_POST['AdresseDestination']."','".$_POST['TelephoneDestination']."','".$_POST['FaxDestination']."','".$_POST['EmailDestination']."'
      ,'".$_POST['PersonneContacterDestination']."','".$_POST['TelephoneContacterDestination']."','".$_POST['EmailContacterDestination']."','".$_POST['VilleDestination']."','".$_POST['AutreDestination']."')";
  
      $res += $DB->executeSQL($insertDestination);

      
      $selectDestination = "SELECT IDDESTINATION from destination WHERE SOCIETE = '".$_POST['SocieteDestination']."' AND PERSONNE_CONTACTER = '".$_POST['PersonneContacterDestination']."'";

      $resultselectDestination = $DB->executeSQL($selectDestination);

      if($resultselectDestination->num_rows > 0){
        if($row = $resultselectDestination->fetch_assoc()){
          $idDestination = $row["IDDESTINATION"]; 
        }
    }
  
  
      /* /.Destination */
  
       /* Operateur */
  
       $insertOperateur = "INSERT INTO nom_operateur(COMPTE_UTILISATEUR, NOM, PRENOM, TELEPHONE ) 
       VALUES('".$_POST['CompteUtilisateur']."','".$_POST['Nom']."','".$_POST['Prenom']."','".$_POST['Telephone']."')";
   
       $res += $DB->executeSQL($insertOperateur);

       $selectOperateur = "SELECT IDNOM_OPERATEUR from nom_operateur WHERE NOM = '".$_POST['Nom']."' AND PRENOM = '".$_POST['Prenom']."'";

       $resultselectOperateur = $DB->executeSQL($selectOperateur);

       if($resultselectOperateur->num_rows > 0){
         if($row = $resultselectOperateur->fetch_assoc()){
           $idOperateur = $row["IDNOM_OPERATEUR"]; 
         }
     }
   
       /* /.Operateur */
  
  
      

        /* Commande */

        $dateli = date('y-m-d',strtotime($_POST['DateLivraison']));

        $insertCommande = "INSERT INTO commande(CLIENT, DEPART, DESTINATION, NOM_OPERATEUR, TYPE_VEHICULE, TRANSPORTATEUR, N_OPERATION, NBC, DATE_LIVRAISON,
        PRIX_FACTUREE, PRIX_TRANSPORT, PRIX_TTC, NOTE) VALUES('".$idClient."','".$idDepart."','".$idDestination."','".$idOperateur."','".$_POST['vehicule']."',
        '".$idTransportateur."','".$_POST['operation']."','".$_POST['NBC']."','".$dateli."','".$_POST['PrixFacturee']."','".$_POST['PrixTransport']."','".$_POST['PrixTTC']."',
        '".$_POST['Note']."')";

        $res += $result = $DB->executeSQL($insertCommande);

        /* /.Commande */

        header("Location:../AjouterCommande.php");
    }
}

?>