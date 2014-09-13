<?php
include"dbconnect.php";
	//	print_r($_REQUEST);
         $formsubmit = isset($_REQUEST['submit'])   ? $_REQUEST['submit'] :"";
         $formUser   = isset($_REQUEST['username']) ? $_REQUEST['username']:"";
         $formPass   = isset($_REQUEST['password']) ? $_REQUEST['password']:"";
		 
         if($formsubmit=="Login"){
		    //print("test");
			 $result  = query("select *from usercredential where username='$formUser'");
			// print("select *from usercredential where username='$formUser'");
			 if(mysqli_num_rows($result)>0){
						 $row      = mysqli_fetch_object($result);
			 $dbId     = $row->id;
			 $dbPass   = $row->password;
			 
			 if($dbPass==$formPass){
			 
			  session_start();
			  $_SESSION['loggedInpermission']= "yes";
			  $_SESSION['loggedUsername']    = $username;
			  
			  $_SESSION['loggedId']    		 = $username;
			  URL_forward("dashboard.php",0);
			  exit;
			 }
			 else{
			 URL_forward('index.php?error=invalid username or password',0);
			 exit;
			 }
		}  else {
                 URL_forward('index.php?error=invalid username or password',0);    
                }
         }
