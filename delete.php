<?php
include"dbconnect.php";

         $submit     = isset($_REQUEST['submit'])   ? $_REQUEST['submit'] :"";
         $username   = isset($_REQUEST['username']) ? $_REQUEST['username']:"";
         $password   = isset($_REQUEST['password']) ? $_REQUEST['password']:"";
         $userlevel  = isset($_REQUEST['userlevel'])? $_REQUEST['userlevel']:"";
         $userpin    = isset($_REQUEST['userpin'])  ? $_REQUEST['userpin']:"";
         $date 		 = date('Y-m-d H:i:s');
		 
		 $error        ="";
		 $suceess      ="";
		 $query        ="";
  
/*The above code will work like, If data is not set for particular variable then by default it will set "". If you do not do set variable initial value in php5 it shows error */


/*For handling Actions*/
$action = isset($_REQUEST['action'])   ? $_REQUEST['action'] :"";
$id     = isset($_REQUEST['id'])       ? $_REQUEST['id'] :0;

if($action=="delete"){
 
  mysqli_query('delete from usercredential where id=$id'); 	
}
elseif($action=="edit"){
  
}


/**/
         
//print_r($_POST);

         
if($submit == "Submit")
{

if($username =="")
    
 {
   $error="username can't null";
 }
 
 else if($password =="")
 {
     $error="Please input password"; 
 }
 /*else if ($amount<50) { 
     $error="Please input valid amoumt";
 
} */
elseif ($userpin == "") {
    $error = "Please enter a valid pin no";
}
    
 
 else
 {
   if(!mysqli_query($conn,"insert into usercredential set username='$username',password='$password', userlevel='$userlevel',  userpin='$userpin', date='$date'"))
   {
     echo mysqli_error($conn);
     exit;
   }
   else
   {
     $suceess="Successfully Data Inserted";
   }

 }

}
?>


<html>
    <title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form1" method="post" action="">
  <table width="500" border="1" align="center" cellpadding="5" cellspacing="3">
      <caption>
           
          
          <?php
  

  if($error!=""){echo"<font color='red'>$error</font>";}
   if($suceess!=""){echo"<font color='green'>$suceess</font>";}

  ?>
      </caption>
    <body>
          <form method="post" action="">
            username : <input type="text" name="username"><br/><br/>
            password : <input type="password" name="password"><br/><br/>
            
            
         Userlevel : 
            <select name="userlevel"> <option value="Reseller 4">Reseller 4</option>
            <option value="Reseller 3">Reseller 3</option>
           <option value="Reseller 2">Reseller 2</option>
            <option value="Reseller 1">Reseller 1</option></select><br/><br/> 
           
           
            Userpin : <input type="text" name="userpin"><br/><br/>
            Submit : <input type="submit" name="submit" value="Submit">
      </form>
        
        
        
        
        <table width="500" border="0" align="center" cellpadding="5" cellspacing ="3" bordercolor="#CC6600">
            <tr> 
    <td><strong>Username</strong></td>
    <td><strong>Password</strong></td> 
    <td><strong>Userlevel</strong></td>
    <td><strong>Userpin</strong></td>
    <td><strong>Date</strong></td>
    
  </tr>
  
<?php
   $result=  mysqli_query($conn,"select * from usercredential");
  while($row= mysqli_fetch_object($result))
  {
  $username         = $row->username;
  $password         = $row->password;
  $userlevel        = $row->userlevel;
  $userpin          = $row->userpin;
  $date             = $row->date;
  $row              = $row->id;
  
  echo"
  
  <tr>
    <td>$username</td>
    <td>$password</td>
    <td>$userlevel</td>
    <td>$userpin</td>
    <td>$date</td>
	<td><a href='?action=delelte&id=$id'>Delete</a></td>
	<td><a href='?action=edit&id=$id'>Delete</a></td>        
  </tr>
  ";
  }
  
  ?>  
        </table>
     
        
      
    </body>
</html>
<?php exit;?>
