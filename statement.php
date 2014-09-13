<?php
include"login.check.php";
include"dbconnect.php";
include "header.php";
?>

        
        
    <table width="500" border="1" align="center" cellpadding="5" cellspacing ="3" bordercolor="#CC6600">
    <tr> 
    <td><strong>Balance</strong></td>
    <td><strong>Date</strong></td> 
     
  </tr>
  
<?php
$userid =$_REQUEST['userid'];
   $result=  query("select * from statement where userid='$userid' ");
  while($row= mysqli_fetch_object($result))
  {
  $balance          = $row->balance;
  $date         = $row->sdate;
  
  
  echo"
  
  <tr>
    <td>$balance</td>
    <td>$date</td>
  </tr>
  ";
  }
  
  ?>  
        </table>
     
        
   <?php include "footer.php";?>