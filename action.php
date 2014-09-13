<?php
include "login.check.php";
include "dbconnect.php";

$action     = isset($_REQUEST['action'])   ? $_REQUEST['action'] :"";

//Add new User
if($action=="addNewsUser"){
         $username    = isset($_REQUEST['username']) ? $_REQUEST['username']:"";
         $password    = isset($_REQUEST['password']) ? $_REQUEST['password']:"";
		 $phone       = isset($_REQUEST['phone'])    ? $_REQUEST['phone']:"";
		 $gender      = isset($_REQUEST['gender'])   ? $_REQUEST['gender']:"";
			 if($username==""){
			 $error="Please enter usernaem";
			 header("location:add.php?error=$error");
			 exit;
			 }
			 elseif($password=="password"){
			 $error="Please enter password";
			 header("location:add.php?error=$error");
			 exit;
			 }
			 else{
			 $date 		 = date('Y-m-d');
			 
			 query("INSERT INTO usercredential 
					SET username = '$username'
					,   password = '$password'
					,   sdate    = '$date'
					,   phone    = '$phone'
					,	gender	 = '$gender'
					"
				  );
			 header("location:view.php");
			 exit;
			 }

}
//Update User
if($action=="updateUser"){
         $username    = isset($_REQUEST['username']) ? $_REQUEST['username']:"";
         $password    = isset($_REQUEST['password']) ? $_REQUEST['password']:"";
		 $phone       = isset($_REQUEST['phone'])    ? $_REQUEST['phone']:"";
		 $gender      = isset($_REQUEST['gender'])   ? $_REQUEST['gender']:"";
		 $id          = isset($_REQUEST['id'])       ? $_REQUEST['id']:"";
	  	 $id          = abs(filter_var($id,FILTER_VALIDATE_INT));
		 
		 
			 if($username==""){
			 $error="Please enter usernaem";
			 header("location:edit.php?id=$id&error=$error");
			 exit;
			 }
			 elseif($password=="password"){
			 $error="Please enter password";
			 header("location:edit.php?id=$id&error=$error");
			 exit;
			 }
			 else{
			 $date 		 = date('Y-m-d');
			 
			 query("UPDATE  usercredential 
					SET username = '$username'
					,   password = '$password'
					,   sdate    = '$date'
					,   phone    = '$phone'
					,	gender	 = '$gender'
					WHERE
						id       = '$id' 
					"
				  );
			 header("location:edit.php?id=$id&msg=Succesfully Update Completed.");
			 exit;
			 }

}

//Delete User
if($action=="deleteUser"){
                        $id        = isset($_REQUEST['id']) ? $_REQUEST['id']:0;
			query("delete from usercredential where id='$id'");
			URL_forward ("view.php",0);
			exit;

}


//Add Balance
if($action=="addBalanceUser"){
                 $balance        = isset($_REQUEST['balance']) ? $_REQUEST['balance']:"";
		 $balance        = abs($balance);
                 $id        = isset($_REQUEST['id']) ? $_REQUEST['id']:0;
                 $id             = abs(filter_var($id,FILTER_VALIDATE_INT));
		 $addedby        = $_SESSION['loggedUsername'];
		 
		 
			 if($balance==""){
			 $error="Please Enter Balance";
			 header("location:add_balance.php?error=$error&id=$id");
			 exit;
			 }
			 
			 else{
			 $date 		 = date('Y-m-d');
								 try 
								 {
									 query("SET AUTOCOMMIT=0");
									 query("START TRANSACTION");
									 
									 
									 query("UPDATE usercredential SET    balance = balance+$balance	WHERE id= '$id' " );
									 query("INSERT INTO statement 
											SET balance='$balance'
											,sdate  ='$date'
											,action ='add'
											,userid ='$id'
											,addedby  ='$addedby'
											"
										);
									 query("COMMIT");
									 header("location:view.php?msg=Successfully Balance Added.");
									 exit;
									}
								catch (Exception $e) {
									 query("ROLLBACK");
									  header("location:edit.php?error=problem:$e");
									  exit;
									
									}
				}
			
			 
}


//Logout
if($action=="logoutUser"){
$_SESSION=array();
URL_forward("index.php",0);

exit;
}
			 





