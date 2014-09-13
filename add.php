<?php
include "login.check.php";
$error = isset($_REQUEST['error'])   ? $_REQUEST['error'] :"";
$msg    = isset($_REQUEST['msg'])  ? $_REQUEST['msg'] :"";
include "header.php";
?>
    <div class="login">
	<?php print("<h3>$error $msg</h3>");?>
      <h1>Insert New User</h1>
      <form method="post" action="action.php?action=addNewsUser">
        <p><label>username</label><input type="text"     name="username" value="" placeholder="Username "></p>
        <p><label>password</label><input type="password" name="password" value="" placeholder="Password"></p>
		<p><label>Phone</label><input type="text" 	     name="phone" value="" placeholder="Password"></p>		
		<p><label>Gender</label>
							<select name='gender'>
								<option value='male'>Male</option>
								<option value='female'>Female</option>
							</select>
		</p>		
        <p class="submit"><input type="submit" name="submit" value="Add"></p>
      </form>
    </div>

  <?php include"footer.php";?>
