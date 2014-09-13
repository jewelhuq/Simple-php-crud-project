<?php
include "login.check.php";
include "dbconnect.php";

$error  = isset($_REQUEST['error'])  ? $_REQUEST['error'] :"";
$msg    = isset($_REQUEST['msg'])  ? $_REQUEST['msg'] :"";
$id    = isset($_REQUEST['id'])  ? $_REQUEST['id'] :0;
$id     = filter_var($id,FILTER_VALIDATE_INT);
$result =  query("select * from usercredential where id='$id'");

  $row= mysqli_fetch_object($result);
  $username         = $row->username;
  unset($row);
  
  
include "header.php";
?>
    <div class="login">
      <h1>Add Balance To  User(<?php print($username); ?>)</h1>
	  <?php print("<h3>$error $msg</h3>");?>
      <form method="post" action="action.php?action=addBalanceUser">
        <p><label>Please Enter Amount</label><input type="text"     name="balance" value="0.00" placeholder="Amount "></p>
		<input type='hidden' name='id' value='<?php print($id);?>'>
        <p class="submit"><input type="submit" name="submit" value="Add"></p>
      </form>
    </div>

<?php include "footer.php";?>


