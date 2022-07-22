<?php
require_once("tools/DBconnection.php");
require("entities/admin.php");
require("entities/operation.php");
require("entities/vehicule.php");


$page = "OPERATION / VEHICULE";

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



if(isset($_POST['Ajouter'])){

 

  $type = $_POST['type'];
  $note = $_POST['note'];
  $autre = $_POST['autre'];

  $action = $_POST['Ajouter'];

  $result = null;

  if($action === "Operation"){

    $Ajouter = "INSERT INTO type_operation(TYPE,NOTE,AUTRE) VALUES('".$type."','".$note."','".$autre."')";
  $result = $DB->executeSQL($Ajouter);

  }else if($action === "Vehicule"){

    $Ajouter = "INSERT INTO type_vehicule(TYPE,NOTE,AUTRE) VALUES('".$type."','".$note."','".$autre."')";
    $result = $DB->executeSQL($Ajouter);

  }

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
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter Operation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type Operation</label>
                    <input type="text" class="form-control" name="type" id="exampleInputEmail1" placeholder="Type operation">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Note</label>
                    <input type="text" class="form-control" name="note" id="exampleInputPassword1" placeholder="Note">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Autre</label>
                    <input type="text" class="form-control" name="autre" id="exampleInputPassword1" placeholder="Autre">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="Ajouter" value="Operation" class="btn btn-primary">Ajouter</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ajouter Vehicule</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type Vehicule</label>
                    <input type="text" class="form-control" name="type" id="exampleInputEmail1" placeholder="Type vehicule">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Note</label>
                    <input type="text" class="form-control" name="note" id="exampleInputPassword1" placeholder="Note">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Autre</label>
                    <input type="text" class="form-control" name="autre" id="exampleInputPassword1" placeholder="Autre">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="Ajouter" value="Vehicule" class="btn btn-primary">Ajouter</button>
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
                <h3 class="card-title">OPERATION</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>TYPE</th>
                      <th>NOTE</th>
                      <th>AUTRE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $selectop = "SELECT * FROM type_operation";
                    
                      $operations = $DB->executeSQL($selectop);

                      if($operations->num_rows > 0){

                        $operation = new operation;

                        for($i = 0 ; $i < $operations->num_rows ; $i++){

                          $row = $operations->fetch_assoc();
                          $operation->setId($row["IDTYPE_OPERATION"]); 
                          $operation->setType($row["TYPE"]);   
                          $operation->setNote($row["NOTE"]); 
                          $operation->setAutre($row["AUTRE"]); 
                            

                    ?>
                    <tr>
                      <td><?php echo $operation->getId(); ?></td>
                      <td><?php echo $operation->getType(); ?></td>
                      <td><?php echo $operation->getNote(); ?></td>
                      <td><?php echo $operation->getAutre(); ?></td>
                    </tr>
                    <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <!-- row -->
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">VEHICULE</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>TYPE</th>
                      <th>NOTE</th>
                      <th>AUTRE</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php

                          $selectve = "SELECT * FROM type_vehicule";

                          $vehicules = $DB->executeSQL($selectve);

                          if($vehicules->num_rows > 0){

                            $vehicule = new vehicule;

                            for($i = 0 ; $i < $vehicules->num_rows ; $i++){

                              $row = $vehicules->fetch_assoc();
                              $vehicule->setId($row["IDTYPE_VEHICULE"]); 
                              $vehicule->setType($row["TYPE"]);   
                              $vehicule->setNote($row["NOTE"]); 
                              $vehicule->setAutre($row["AUTRE"]); 
                                

                          ?>

                          <tr>
                          <td><?php echo $vehicule->getId(); ?></td>
                          <td><?php echo $vehicule->getType(); ?></td>
                          <td><?php echo $vehicule->getNote(); ?></td>
                          <td><?php echo $vehicule->getAutre(); ?></td>
                          </tr>

                          <?php
                            }
                          }
                      ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
