<?php
session_start();
$_SESSION['loggedInpermission']  = isset($_SESSION['loggedInpermission'])  ? $_SESSION['loggedInpermission'] :"";

if($_SESSION['loggedInpermission']!="yes"){
   $_SESSION=array();
   header('location :login.php');
  exit;
}
?>