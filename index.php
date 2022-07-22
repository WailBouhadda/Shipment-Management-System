<?php


require("entities/admin.php");

session_start();

$admin = new admin;

$admin = $_SESSION['admin'];

if($admin != null){

    header("Location:dashboard.php");

}else{
    header("Location:login.php");
}





?>