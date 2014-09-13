<?php
include "login.check.php";
include "dbconnect.php";

$error  = isset($_REQUEST['error'])  ? $_REQUEST['error'] :"";
$msg    = isset($_REQUEST['msg'])    ? $_REQUEST['msg'] :"";
$id     = isset($_REQUEST['id'])     ? $_REQUEST['id'] :0;
$id     = filter_var($id,FILTER_VALIDATE_INT);
$result =  query("select * from usercredential where id='$id'");

  $row= mysqli_fetch_object($result);
  
  $username         = $row->username;
  $password         = $row->password;
  $phone            = $row->phone;
  $gender           = $row->gender;
  				
  include "header.php";
?>
 <div class="login">
      <h1>Edit  User</h1>
	  <?php print("<h3>$error $msg</h3>");?>
      <form method="post" action="action.php?action=updateUser">
        <p><label>username</label><input type="text"     name="username" value="<?php print($username); ?>" placeholder="Username "></p>
        <p><label>password</label><input type="text"     name="password" value="<?php print($password); ?>" placeholder="Password"></p>
        <p><label>Phone</label><input type="text"        name="phone"    value="<?php print($phone); ?>"   placeholder="Password"></p>		
	<p><label>Gender</label>
        <select name='gender'>
	<option <?php if($gender=="male"){print('SELECTED');}?> value='male'>Male</option>
	<option <?php if($gender=="female"){print('SELECTED');}?> value='female'>Female</option>
	</select>
		<input type='hidden' name='id' value='<?php print($id);?>'>
        <p class="submit"><input type="submit" name="submit" value="Update"></p>
      </form>
    </div>

 <?php include "footer.php";?>



