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



$page = "DASHBOARD";
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
  <script src="https://kit.fontawesome.com/e2991dfebd.js" crossorigin="anonymous"></script>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <!-- Info boxes -->
        <div class="row">
          <?php

            $users = null;
            $commandes = null;
            $commandesdone = null;
            $vehicules = null;


            $vehiculeSQL = "SELECT COUNT(*) FROM type_vehicule";

            $ROWVEHICULE = $DB->executeSQL($vehiculeSQL);

            if($ROWVEHICULE->num_rows > 0){
              if($row = $ROWVEHICULE->fetch_assoc()){
                $vehicules = $row["COUNT(*)"]; 
              }
            }
            

            $usersSQL = "SELECT COUNT(*) FROM admin";

            $ROWUSERS = $DB->executeSQL($usersSQL);

            if($ROWUSERS->num_rows > 0){
              if($row = $ROWUSERS->fetch_assoc()){
                $users = $row["COUNT(*)"]; 
              }
            }
            
            $commandeSQL = "SELECT COUNT(*) FROM commande";

            $ROWCOMMANDE = $DB->executeSQL($commandeSQL);

            if($ROWCOMMANDE->num_rows > 0){
              if($row = $ROWCOMMANDE->fetch_assoc()){
                $commandes = $row["COUNT(*)"]; 
              }
            }
            $date = date('y-m-d');
              

            $commandoneSQL = "SELECT COUNT(*) FROM commande WHERE DATE_LIVRAISON > '".$date."'";

            $ROWCOMMANDEDONE = $DB->executeSQL($commandoneSQL);
        
            if($ROWCOMMANDEDONE->num_rows > 0){
              if($row = $ROWCOMMANDEDONE->fetch_assoc()){
                $commandesdone = $row["COUNT(*)"]; 
              }
            }
     


          ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-truck"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Vehicules</span>
                <span class="info-box-number">
                  <?php echo $vehicules;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-clipboard-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Commandes Finished</span>
                <span class="info-box-number"><?php echo $commandesdone;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Commandes</span>
                <span class="info-box-number"><?php echo $commandes;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number"><?php echo $users;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
                 <!-- Default box -->
      <div class="card card-solid">

      <div class="card-body pb-0">
          <div class="row">
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


       
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                <?php echo $destination; ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $client; ?></b></h2>
                      <p class="text-muted text-sm"><b>PRIX: </b> <?php echo $prixttc; ?></p>
                      <p class="text-muted text-sm"><?php echo $note; ?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <?php echo $depart; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <?php echo $transportateur; ?></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="exportfacture.php?id=<?php echo $idcommande; ?>" target="_blank" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Facture
                    </a>
                  </div>
                </div>
              </div>
            </div>
         



        <?php
                    }
                  }
                  ?>
 </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
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

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
