<?php
require_once("tools/DBconnection.php");
require('fpdf/fpdf.php');

$DB = new DBconnection;


class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('images/logo1.png',10,6,30);
     // Logo
     $this->Image('images/logo2.png',170,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(100);
    // Saut de ligne
    $this->Ln(30);
    
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Test de Facture @ TEST TEST',0,0,'C');
}



}




if(isset($_GET['id'])){

    $id = $_GET['id'];


    
  
$selectcommande = "SELECT * FROM commande WHERE IDCOMMANDE = ".$id;
                  
$commandes = $DB->executeSQL($selectcommande);

if($commandes->num_rows == 1){

  if($row = $commandes->fetch_assoc()){

    

     $idcommande = $row["IDCOMMANDE"];
     $idclient = $row["CLIENT"];
     $idtransportateur = $row["TRANSPORTATEUR"];
     $iddepart = $row["DEPART"];
     $iddestination = $row["DESTINATION"];
     $idvehicule = $row["TYPE_VEHICULE"];
     $idoperateur = $row["NOM_OPERATEUR"];
     $idoperation  = $row["N_OPERATION"];
     $NBC = $row["NBC"] ;
     $datecommande = $row["DATE_COMMANDE"];
     $datelivraison = $row["DATE_LIVRAISON"];
     $prixfacturee = $row["PRIX_FACTUREE"];
     $prixttc = $row["PRIX_TTC"];
     $prixtransport = $row["PRIX_TRANSPORT"];
     $note = $row["NOTE"];


     $client = null;
     $transportateur = null;
     $depart = null;
     $destination = null;
     $vehicule= null;
     $operateur = null;
     $operation = null;


     /* -- CLIENT -- */
    $selectclient = "SELECT SOCIETE FROM client WHERE IDCLIENT = ".$idclient;
    
    $ROWCLIENT = $DB->executeSQL($selectclient);

    if($ROWCLIENT->num_rows > 0){
      if($row = $ROWCLIENT->fetch_assoc()){
        $client = $row["SOCIETE"]; 
      }
    }
    /* -- /.CLIENT -- */
    
     /* -- transportateur -- */
    $selecttransportateur = "SELECT SOCIETE FROM transportateur WHERE IDTRANSPORTATEUR = ".$idtransportateur;
    
    $ROWtransportateur = $DB->executeSQL($selecttransportateur);

    if($ROWtransportateur->num_rows > 0){
      if($row = $ROWtransportateur->fetch_assoc()){
        $transportateur = $row["SOCIETE"]; 
      }
    }
    /* -- /.transportateur -- */

      /* -- depart -- */
      $selectdepart = "SELECT SOCIETE FROM depart WHERE IDDEPART = ".$iddepart;
    
      $ROWdepart = $DB->executeSQL($selectdepart);

      if($ROWdepart->num_rows > 0){
        if($row = $ROWdepart->fetch_assoc()){
          $depart = $row["SOCIETE"]; 
        }
      }
      /* -- /.depart -- */

      /* -- destination -- */
      $selectdestination = "SELECT SOCIETE FROM destination WHERE IDDESTINATION = ".$iddestination;
    
      $ROWdestination = $DB->executeSQL($selectdestination);

      if($ROWdestination->num_rows > 0){
        if($row = $ROWdestination->fetch_assoc()){
          $destination = $row["SOCIETE"]; 
        }
      }
      /* -- /.destination -- */ 

      /* -- vehicule -- */
      $selectvehicule = "SELECT TYPE FROM type_vehicule WHERE IDTYPE_VEHICULE = ".$idvehicule;
    
      $ROWvehicule = $DB->executeSQL($selectvehicule);

      if($ROWvehicule->num_rows > 0){
        if($row = $ROWvehicule->fetch_assoc()){
          $vehicule = $row["TYPE"]; 
        }
      }
      /* -- /.vehicule -- */ 

      /* -- operateur -- */
      $selectoperateur = "SELECT NOM FROM nom_operateur WHERE IDNOM_OPERATEUR = ".$idoperateur;
    
      $ROWoperateur = $DB->executeSQL($selectoperateur);

      if($ROWoperateur->num_rows > 0){
        if($row = $ROWoperateur->fetch_assoc()){
          $operateur = $row["NOM"]; 
        }
      }
      /* -- /.operateur -- */

      /* -- operation -- */
      $selectoperation = "SELECT TYPE FROM type_operation WHERE IDTYPE_OPERATION = ".$idoperation;
    
      $ROWoperation = $DB->executeSQL($selectoperation);

      if($ROWoperation->num_rows > 0){
        if($row = $ROWoperation->fetch_assoc()){
          $operation = $row["TYPE"]; 
        }
      }
      /* -- /.operation -- */ 



      // Instanciation de la classe dérivée
$pdf = new PDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',20);

/* Titre */
$pdf->Cell(0,10,"TEST FACTURE",'TB',1,'C',);

$pdf->Ln(30);

$pdf->SetFont('Arial','',10);


$h = '7';
$espace = '            ';


/* Contenu */


/* CLIENT */

$pdf->SetFont('','BI');

$pdf->write($h, "CLIENT : ");

$pdf->SetFont('','');

$pdf->write($h, $espace.$espace.$client."\n");

$pdf->Ln(5);

/* /.CLIENT */


/* TRANSPROTATERU */

$pdf->SetFont('','BI');

$pdf->write($h, "TRANSPORTATEUR : ");

$pdf->SetFont('','');

$pdf->write($h, $espace.$espace.$transportateur."\n");

$pdf->Ln(5);

/* /.TRANSPROTATERU */


/* DEPART - DESTINATION */

$pdf->SetFont('','BI');

$pdf->write($h, "DEPART : ".$espace);

$pdf->SetFont('','');

$pdf->write($h, $espace.$depart."\n");

$pdf->Ln(5);

/* /.DEPART */

/* DESTINATION */

$pdf->SetFont('','BI');

$pdf->write($h, "DESTINATION : ");

$pdf->SetFont('','');

$pdf->write($h, $espace.$destination."\n");


$pdf->Ln(5);

/* /.DESTINATION */



/* DATE */

$pdf->SetFont('','BI');

$pdf->write($h, "DATE DE COMMANDE : ");

$pdf->SetFont('','');

$pdf->write($h, $espace.$datecommande.$espace);

$pdf->SetFont('','BI');

$pdf->write($h, $espace."DATE DE LIVRAISON : ");

$pdf->SetFont('','');

$pdf->write($h, $espace.$datelivraison."\n");

$pdf->Ln(15);

/* /.DATE */

/* NOTE */

$pdf->Ln(10);

$pdf->SetFont('','B');

$pdf->write($h, "NOTE : \n");

$pdf->SetFont('','');

$pdf->write($h, $espace.$note);


$pdf->Ln(25);

/* /.NOTE */

/* TABLE */

$pdf->SetFont('','B');

$pdf->Cell(36,10, "PRIX Facture", 1);
$pdf->Cell(36,10, "PRIX Transport", 1);
$pdf->Cell(36,10, "PRIX TTC",1);
$pdf->Cell(36,10, "VEHICULE", 1);
$pdf->Cell(36,10, "OPERATION", 1);
$pdf->Ln();

$pdf->SetFont('','');

$pdf->Cell(36,10, $prixfacturee, 1);
$pdf->Cell(36,10, $prixtransport, 1);
$pdf->Cell(36,10, $prixttc,1);
$pdf->Cell(36,10, $vehicule, 1);
$pdf->Cell(36,10, $operation, 1);

$pdf->Ln(10);

/* /.TABLE */


/* NOTE */

$pdf->Ln(15);

$pdf->SetFont('','B');

$pdf->write($h, "SIGNATURE : \n");



/* /.NOTE */

/* /.Contenu */

$pdf->Output();




    }
}



}







?>