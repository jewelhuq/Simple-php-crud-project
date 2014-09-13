<?php
$error = isset($_REQUEST['error'])   ? $_REQUEST['error'] :"";

?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div class='containter'>
<section class='topmenu'>
<h1 align='center'>WELCOME TO OUR WEBSITE</h1>
<hr>
</div>


</section>
<section class='leftmenu'>
<div class='about'>
<div class=links>
<ul>
<li><a href='dashboard.php'>dahboard</a></li>
<hr>
<li><a href='add.php'>Add</a></li>
<hr>
<li><a href='view.php'>View</a></li>
<hr>
<li><a href='action.php?action=logoutUser'>Logout</a></li>
</ul>


</section>

  <section class="rightmenu">