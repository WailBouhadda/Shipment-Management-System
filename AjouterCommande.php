<?php

require_once("tools/DBconnection.php");
require("entities/admin.php");
require("entities/operation.php");
require("entities/vehicule.php");
require("entities/client.php");
require("entities/operateur.php");
require("entities/depart.php");
require("entities/destination.php");
require("entities/transportateur.php");
require("entities/commande.php");


$page = "COMMADE";
$DB = new DBconnection;

session_start();

$admin = new admin;

$admin = $_SESSION['admin'];

if($admin != null){

  $nom = $admin->getNom();
  $prenom = $admin->getPrenom();

}else{
  header("Location:login.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $page;?></title>

  

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4-theme.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <script src="https://kit.fontawesome.com/e2991dfebd.js" crossorigin="anonymous"></script>
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php
    include("themeParts/navBar.php");
 ?>
  <!-- /.navbar -->

    <!-- Sidebar -->

 <?php
    include("themeParts/sideBar.php");
 ?>

     <!-- /Sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $page;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

    <!-- row -->
    <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter Commande</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="controlers/Addcommande.php" method="post">
                <div class="card-body">
                    <!-- client transportateur -->  
                    <div class="row">
                        <!-- client -->
                        <div class="col-md-6">
                          <!-- general form elements -->
                              <div class="card card-info">
                                <div class="card-header">
                                  <h3 class="card-title">Client</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                  <div class="card-body">
                                    <!-- Societe telephone -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="SocieteClient">Societe</label>
                                          <input type="text" class="form-control" name="SocieteClient" id="SocieteClient" placeholder="Societe">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="TelephoneClient">Telephone</label>
                                          <input type="text" class="form-control" name="TelephoneClient" id="TelephoneClient" placeholder="Telephone">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Societe telephone -->
                                    <!-- Email Fax -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="EmailClient">Email</label>
                                          <input type="email" class="form-control" name="EmailClient" id="EmailClient" placeholder="Email">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="FaxClient">Fax</label>
                                          <input type="text" class="form-control" name="FaxClient" id="FaxClient" placeholder="Fax">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Email Fax -->
                                    <!-- Adresse -->
                                    <div class="form-group">
                                      <label for="AdresseClient">Adresse</label>
                                      <input type="text" class="form-control" name="AdresseClient" id="AdresseClient" placeholder="Adresse">
                                    </div>
                                    <!-- /.Adresse -->
                                    <!-- Personne a Contacter VILLE -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="PersonneContacterClient">Personne a Contacter</label>
                                          <input type="text" class="form-control" name="PersonneContacterClient" id="PersonneContacterClient" placeholder="Personne a Contacter">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="VilleClient">Ville</label>
                                          <input type="text" class="form-control" name="VilleClient" id="VilleClient" placeholder="Ville">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Personne a Contacter VILLE -->
                                    <!-- Telephone a Contacter Email a Contacter -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="TelephoneContacterClient">Telephone a Contacter</label>
                                          <input type="text" class="form-control" name="TelephoneContacterClient" id="TelephoneContacterClient" placeholder="Telephone a Contacter">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="EmailContacterClient">Email a Contacter</label>
                                          <input type="email" class="form-control" name="EmailContacterClient" id="EmailContacterClient" placeholder="Email a Contacter">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Telephone a Contacter Email a Contacter -->
                                    <!-- Autre -->
                                    <div class="form-group">
                                      <label for="AutreClient">Autre</label>
                                      <input type="text" class="form-control" name="AutreClient" id="AutreClient" placeholder="Autre">
                                    </div>
                                    <!-- /.Autre -->
                                  </div>  
                                  <!-- /.card-body -->
                              </div>
                              <!-- /.card -->  
                        </div>
                        <!-- /.client -->
                        <!-- transportateur -->
                        <div class="col-md-6">
                          <!-- general form elements -->
                              <div class="card card-info">
                                <div class="card-header">
                                  <h3 class="card-title">Transportateur</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                  <div class="card-body">
                                    <!-- Societe telephone -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="SocieteTransportateur">Societe</label>
                                          <input type="text" class="form-control" name="SocieteTransportateur" id="SocieteTransportateur" placeholder="Societe">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="TelephoneTransportateur">Telephone</label>
                                          <input type="text" class="form-control" name="TelephoneTransportateur" id="TelephoneTransportateur" placeholder="Telephone">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Societe telephone -->
                                    <!-- Email Fax -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="EmailTransportateur">Email</label>
                                          <input type="email" class="form-control" name="EmailTransportateur" id="EmailTransportateur" placeholder="Email">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="FaxTransportateur">Fax</label>
                                          <input type="text" class="form-control" name="FaxTransportateur" id="FaxTransportateur" placeholder="Fax">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Email Fax -->
                                    <!-- Adresse -->
                                    <div class="form-group">
                                      <label for="AdresseTransportateur">Adresse</label>
                                      <input type="text" class="form-control" name="AdresseTransportateur" id="AdresseTransportateur" placeholder="Adresse">
                                    </div>
                                    <!-- /.Adresse -->
                                    <!-- Personne a Contacter VILLE -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="PersonneContacterTransportateur">Personne a Contacter</label>
                                          <input type="text" class="form-control" name="PersonneContacterTransportateur" id="PersonneContacterTransportateur" placeholder="Personne a Contacter">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="VilleClient">Ville</label>
                                          <input type="text" class="form-control" name="VilleTransportateur" id="VilleTransportateur" placeholder="Ville">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Personne a Contacter VILLE -->
                                    <!-- Telephone a Contacter Email a Contacter -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="TelephoneContacterTransportateur">Telephone a Contacter</label>
                                          <input type="text" class="form-control" name="TelephoneContacterTransportateur" id="TelephoneContacterTransportateur" placeholder="Telephone a Contacter">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="EmailContacterTransportateur">Email a Contacter</label>
                                          <input type="email" class="form-control" name="EmailContacterTransportateur" id="EmailContacterTransportateur" placeholder="Email a Contacter">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Telephone a Contacter Email a Contacter -->
                                    <!-- Autre -->
                                    <div class="form-group">
                                      <label for="AutreTransportateur">Autre</label>
                                      <input type="text" class="form-control" name="AutreTransportateur" id="AutreTransportateur" placeholder="Autre">
                                    </div>
                                    <!-- /.Autre -->
                                  </div>  
                                  <!-- /.card-body -->
                              </div>
                              <!-- /.card -->  
                        </div>
                        <!-- /.transportateur -->
                    </div>
                    <!-- /.client transportateur --> 
                    <!-- depart destination --> 
                    <div class="row">
                        <!-- Depart -->
                        <div class="col-md-6">
                          <!-- general form elements -->
                              <div class="card card-secondary">
                                <div class="card-header">
                                  <h3 class="card-title">Depart</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                  <div class="card-body">
                                    <!-- Societe telephone -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="SocieteDepart">Societe</label>
                                          <input type="text" class="form-control" name="SocieteDepart" id="SocieteDepart" placeholder="Societe">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="TelephoneDepart">Telephone</label>
                                          <input type="text" class="form-control" name="TelephoneDepart" id="TelephoneDepart" placeholder="Telephone">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Societe telephone -->
                                    <!-- Email Fax -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="EmailDepart">Email</label>
                                          <input type="email" class="form-control" name="EmailDepart" id="EmailDepart" placeholder="Email">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="FaxDepart">Fax</label>
                                          <input type="text" class="form-control" name="FaxDepart" id="FaxDepart" placeholder="Fax">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Email Fax -->
                                    <!-- Adresse -->
                                    <div class="form-group">
                                      <label for="AdresseDepart">Adresse</label>
                                      <input type="text" class="form-control" name="AdresseDepart" id="AdresseDepart" placeholder="Adresse">
                                    </div>
                                    <!-- /.Adresse -->
                                    <!-- Personne a Contacter VILLE -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="PersonneContacterDepart">Personne a Contacter</label>
                                          <input type="text" class="form-control" name="PersonneContacterDepart" id="PersonneContacterDepart" placeholder="Personne a Contacter">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="VilleDepart">Ville</label>
                                          <input type="text" class="form-control" name="VilleDepart" id="VilleDepart" placeholder="Ville">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Personne a Contacter VILLE -->
                                    <!-- Telephone a Contacter Email a Contacter -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="TelephoneContacterDepart">Telephone a Contacter</label>
                                          <input type="text" class="form-control" name="TelephoneContacterDepart" id="TelephoneContacterDepart" placeholder="Telephone a Contacter">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="EmailContacterDepart">Email a Contacter</label>
                                          <input type="email" class="form-control" name="EmailContacterDepart" id="EmailContacterDepart" placeholder="Email a Contacter">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Telephone a Contacter Email a Contacter -->
                                    <!-- Autre -->
                                    <div class="form-group">
                                      <label for="AutreDepart">Autre</label>
                                      <input type="text" class="form-control" name="AutreDepart" id="AutreDepart" placeholder="Autre">
                                    </div>
                                    <!-- /.Autre -->
                                  </div>  
                                  <!-- /.card-body -->
                              </div>
                              <!-- /.card -->  
                        </div>
                        <!-- /.Depart -->
                        <!-- Destination -->
                        <div class="col-md-6">
                          <!-- general form elements -->
                              <div class="card card-secondary">
                                <div class="card-header">
                                  <h3 class="card-title">Destination</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                  <div class="card-body">
                                    <!-- Societe telephone -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="SocieteDestination">Societe</label>
                                          <input type="text" class="form-control" name="SocieteDestination" id="SocieteDestination" placeholder="Societe">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="TelephoneDestination">Telephone</label>
                                          <input type="text" class="form-control" name="TelephoneDestination" id="TelephoneDestination" placeholder="Telephone">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Societe telephone -->
                                    <!-- Email Fax -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="EmailDestination">Email</label>
                                          <input type="email" class="form-control" name="EmailDestination" id="EmailDestination" placeholder="Email">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="FaxDestination">Fax</label>
                                          <input type="text" class="form-control" name="FaxDestination" id="FaxDestination" placeholder="Fax">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Email Fax -->
                                    <!-- Adresse -->
                                    <div class="form-group">
                                      <label for="AdresseDestination">Adresse</label>
                                      <input type="text" class="form-control" name="AdresseDestination" id="AdresseDestination" placeholder="Adresse">
                                    </div>
                                    <!-- /.Adresse -->
                                    <!-- Personne a Contacter VILLE -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="PersonneContacterDestination">Personne a Contacter</label>
                                          <input type="text" class="form-control" name="PersonneContacterDestination" id="PersonneContacterDestination" placeholder="Personne a Contacter">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="VilleDepart">Ville</label>
                                          <input type="text" class="form-control" name="VilleDestination" id="VilleDestination" placeholder="Ville">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Personne a Contacter VILLE -->
                                    <!-- Telephone a Contacter Email a Contacter -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="TelephoneContacterDestination">Telephone a Contacter</label>
                                          <input type="text" class="form-control" name="TelephoneContacterDestination" id="TelephoneContacterDestination" placeholder="Telephone a Contacter">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="EmailContacterDestination">Email a Contacter</label>
                                          <input type="email" class="form-control" name="EmailContacterDestination" id="EmailContacterDestination" placeholder="Email a Contacter">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.Telephone a Contacter Email a Contacter -->
                                    <!-- Autre -->
                                    <div class="form-group">
                                      <label for="AutreDestination">Autre</label>
                                      <input type="text" class="form-control" name="AutreDestination" id="AutreDestination" placeholder="Autre">
                                    </div>
                                    <!-- /.Autre -->
                                  </div>  
                                  <!-- /.card-body -->
                              </div>
                              <!-- /.card -->  
                        </div>
                        <!-- /.Destination -->
                    </div>
                    <!-- /.depart destination -->
                    <!-- operateur-->  
                    <div class="row">
                          
                          <div class="col-md-12">
                          <!-- general form elements -->
                              <div class="card card-info">
                                <div class="card-header">
                                  <h3 class="card-title">Operateur</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                  <div class="card-body">
                                    <!-- nom - prenom -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="Nom">Nom</label>
                                          <input type="text" class="form-control" name="Nom" id="Nom" placeholder="Nom">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="Prenom">Prenom</label>
                                          <input type="text" class="form-control" name="Prenom" id="Prenom" placeholder="Prenom">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.nom - prenom -->
                                    <!-- compte utilisateur - telephone -->
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="CompteUtilisateur">Compte Utilisateur</label>
                                          <input type="text" class="form-control" name="CompteUtilisateur" id="CompteUtilisateur" placeholder="CompteUtilisateur">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="Telephone">Telephone</label>
                                          <input type="text" class="form-control" name="Telephone" id="Telephone" placeholder="Telephone">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.compte utilisateur - telephone -->
                                  </div>  
                                  <!-- /.card-body -->
                              </div>
                              <!-- /.card -->  
                        </div>
                        
                      </div>
                    <!-- /.operateur-->  
                    <!-- vehicule operation Date Prix-->  
                    <div class="row"> 
                        <!-- type operation - Date Livraison - Prix Facturee - Prix TTC -->
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label>Type Operation</label>
                            <select class="select2" multiple="multiple" data-placeholder="Selectioner un type d'operation" name="operation"  style="width: 100%;">

                            <option selected="selected"></option>
                            <?php

                              $selectop = "SELECT * FROM type_operation";

                              $operations = $DB->executeSQL($selectop);

                              if($operations->num_rows > 0){

                                $operation = new operation;

                                for($i = 0 ; $i < $operations->num_rows ; $i++){

                                  $row = $operations->fetch_assoc();
                                  $operation->setId($row["IDTYPE_OPERATION"]); 
                                  $operation->setType($row["TYPE"]);   

                              ?>
                              <option value="<?php echo $operation->getId(); ?>"><?php echo $operation->getType(); ?></option>
                              <?php
                                }
                              }
                              ?>

                            </select>
                          </div>
                          <!-- /.form-group -->
                          <!-- Date Livraison -->
                          <div class="form-group">
                            <label>Date Livraison:</label>
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input type="text" name="DateLivraison" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.Date Livraison-->
                          <!-- Prix Facturee-->
                          <div class="form-group">
                              <label for="PrixFacturee">Prix Facturee</label>
                              <input type="text" class="form-control" name="PrixFacturee" id="PrixFacturee" placeholder="Prix Facturee">
                          </div>
                          <!-- /.Prix Facturee-->
                          <!-- Prix TTC-->
                          <div class="form-group">
                              <label for="PrixTTC">Prix TTC</label>
                              <input type="text" class="form-control" name="PrixTTC" id="PrixTTC" placeholder="Prix TTC">
                          </div>
                          <!-- /.Prix TTC-->
                          <!-- /.col -->
                        </div>
                        <!-- /.type operation - Date Livraison - Prix Facturee - Prix TTC -->
                        <!-- type vehicule - NBC - Prix Transport - Autre -->
                        <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label>Type Vehicule</label>
                            <select class="select2" multiple="multiple" data-placeholder="Selectioner un type de vehicule" name="vehicule"  style="width: 100%;">

                            <option selected="selected"></option>
                            <?php

                                $selectve = "SELECT * FROM type_vehicule";

                                $vehicules = $DB->executeSQL($selectve);

                                if($vehicules->num_rows > 0){

                                  $vehicule = new vehicule;

                                  for($i = 0 ; $i < $vehicules->num_rows ; $i++){

                                    $row = $vehicules->fetch_assoc();
                                    $vehicule->setId($row["IDTYPE_VEHICULE"]); 
                                    $vehicule->setType($row["TYPE"]);   
                                    
                              ?>
                              <option value="<?php echo $vehicule->getId(); ?>"><?php echo $vehicule->getType(); ?></option>
                              <?php
                                }
                              }
                              ?>

                            </select>
                          </div>
                          <!-- /.form-group -->
                          <!-- NBC-->
                          <div class="form-group">
                              <label for="NBC">NBC</label>
                              <input type="text" class="form-control" name="NBC" id="NBC" placeholder="NBC">
                          </div>
                          <!-- /.NBC-->
                            <!-- Prix Transport-->
                          <div class="form-group">
                              <label for="PrixFacturee">Prix Transport</label>
                              <input type="text" class="form-control" name="PrixTransport" id="PrixTransport" placeholder="Prix Transport">
                          </div>
                          <!-- /.Prix Transport-->
                          <!-- Autre-->
                          <div class="form-group">
                              <label for="Note">Note</label>
                              <input type="text" class="form-control" name="Note" id="Note" placeholder="Note">
                          </div>
                          <!-- /.Autre-->
                          <!-- /.col -->
                        </div>
                        <!-- /.type vehicule - NBC - Prix Transport - Autre  -->
                      </div>
                    </div>
                    <!-- /.vehicule operation Date Prix-->
                    <!-- date nbc -->   
                    <div>

                    <!-- /.date nbc --> 
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="Ajouter" value="Commande" class="btn btn-primary">Ajouter</button>
                      <button type="reset" class="btn btn-danger">Annuler</button>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <!-- row -->
    <div class="row">
      <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des Commandes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Depart</th>
                    <th>Destination</th>
                    <th>Operateur</th>
                    <th>Vehicule</th>
                    <th>Transportateur</th>
                    <th>Operation</th>
                    <th>NBC</th>
                    <th>Date Commande</th>
                    <th>Date Livraison</th>
                    <th>Prix Facturee</th>
                    <th>Prix Transport</th>
                    <th>Prix TTC</th>
                    <th>Note</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  
                  $selectcommande = "SELECT * FROM commande";
                  
                  $commandes = $DB->executeSQL($selectcommande);

                  if($commandes->num_rows > 0){

                    for($i = 0 ; $i < $commandes->num_rows ; $i++){

                      $row = $commandes->fetch_assoc();

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


                  ?>

                  <tr>
                      <td><?php echo $idcommande; ?><a style="color:green;margin-left:5px;" href="exportfacture.php?id=<?php echo $idcommande; ?>" target="_blank"><i class="fa-solid fa-file-arrow-down"></i></a></td>
                      <td><?php echo $client; ?></td>
                      <td><?php echo $depart; ?></td>
                      <td><?php echo $destination; ?></td>
                      <td><?php echo $operateur; ?></td>
                      <td><?php echo $vehicule; ?></td>
                      <td><?php echo $transportateur; ?></td>
                      <td><?php echo $operation; ?></td>
                      <td><?php echo $NBC; ?></td>
                      <td><?php echo $datecommande; ?></td>
                      <td><?php echo $datelivraison; ?></td>
                      <td><?php echo $prixfacturee; ?></td>
                      <td><?php echo $prixttc; ?></td>
                      <td><?php echo $prixtransport; ?></td>
                      <td><?php echo $note; ?></td>

                  </tr>

                  <?php
                    }
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Client</th>
                    <th>Depart</th>
                    <th>Destination</th>
                    <th>Operateur</th>
                    <th>Vehicule</th>
                    <th>Transportateur</th>
                    <th>Operation</th>
                    <th>NBC</th>
                    <th>Date Commande</th>
                    <th>Date Livraison</th>
                    <th>Prix Facturee</th>
                    <th>Prix Transport</th>
                    <th>Prix TTC</th>
                    <th>Note</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->                       
    </div>
    <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
  </script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
