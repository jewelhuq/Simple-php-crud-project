<?php
include"login.check.php";
include"dbconnect.php";

include "header.php";
?>        
    <table width="900" border="1" align="center" cellpadding="5" cellspacing ="3" bordercolor="#CC6600">
    <tr> 
    <td><strong>Username</strong></td>
     <td><strong>Balance</strong></td>
    <td><strong>Password</strong></td> 
    <td><strong>Phone</strong></td>
    <td><strong>Gender</strong></td>
    <td><strong>Date</strong></td>
    
    <td><strong>Add Payment</strong></td>
    <td><strong>Statement</strong></td>
    <td><strong>Edit</strong></td>
     
     <td><strong>Delete</strong></td>
    
  </tr>
  
<?php
   $result=  query("select * from usercredential");
  while($row= mysqli_fetch_object($result))
  {
  $username         = $row->username;
  $balance          = $row->balance;
  
  $password         = $row->password;
  $phone            = $row->phone;
  $gender           = $row->gender;
  $date             = $row->sdate;
  $id				= $row->id;
  
  
  echo"
  
  <tr>
    <td>$username</td>
    <td>$balance</td>        
    <td>$password</td>
    <td>$phone</td>
    <td>$gender</td>
    <td>$date</td>
	<td><a href='add_balance.php?id=$id'>Add Balance</a></td>        			
	<td><a href='statement.php?userid=$id'>Statement</a></td>        				
	<td><a href='edit.php?id=$id'>Edit</a></td>        	
	<td><a href='action.php?action=deleteUser&id=$id'>Delete</a></td>
	
  </tr>
  ";
  }
  
  ?>  
        </table>
     
        
    
<?php include"footer.php";?>
