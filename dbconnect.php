<?php
/**
Author   :  Md Mazaharul Huq
Email    :  jewelhuq@gmail.com
Blog     :  jewelhuq.wordpress.com
Created  :
**/

$dbUser = "root";
$dbPass = "";
$dbName = "flexiload";
$dbHost = "localhost";


$conn   = mysqli_connect($dbHost,$dbUser,$dbPass);
mysqli_select_db($conn, $dbName);



/*Start Security Purpose*/
if (get_magic_quotes_gpc()) {
    function stripslashesGpc(&$value)
    {
        $value = stripslashes($value);
    }
    array_walk_recursive($_GET		, 'stripslashesGpc');
    array_walk_recursive($_POST		, 'stripslashesGpc');
    array_walk_recursive($_COOKIE	, 'stripslashesGpc');
    array_walk_recursive($_REQUEST	, 'stripslashesGpc');
}

//Prevent Sql Injection
$_POST = isset($_POST)?$_POST:"";
array_walk($_POST, function(&$string) use ($conn) { $string = mysqli_real_escape_string($conn, $string);});



/*End Security Purpose*/





function query($query){
global $conn;
$result=mysqli_query($conn,$query) or die("<li>Query:$query</li>Error: <li>Errpr:".mysqli_error($conn)."</li>");
return $result;
}

function URL_forward( $Page, $Time )
{
    print("<script language=\"JavaScript\">");

    print("setTimeout(\"startover()\", $Time);");

    print("function startover()");
    print("{ window.location = '$Page';}");
    print("</script>");
}


?>