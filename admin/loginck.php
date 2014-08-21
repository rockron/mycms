<?php
ob_start();
?>
<?php

include "include/session.php";
include "db.php";
$userid=$_POST['userid'];
$password=$_POST['password'];
error_reporting(E_ALL);



?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>
<style type="text/css">
a{
	color:#FFF;
}
a.active{
	color:#FFF;
}
a:hover{
	color:#FFF;
}
</style>
<head>
<title>Login Page</title>

</head>

<body >
<?

//$userid=mysql_real_escape_string($userid);
//$password=mysql_real_escape_string($password);
$query = mysql_query("SELECT * FROM login WHERE username='".$userid ."'");
if($rec=mysql_fetch_array($query)){;


if(($rec['username']==$userid)&&($rec['password']==$password)){
	
		 include "include/newsession.php";

		$tm=date("Y-m-d H:i:s");
echo "<p class=data style='color:#fff;'> <center>Successfully,Logged in<br><br><a href='logout.php'> Log OUT </a><br><br><a href=getList.html>Click here if your browser is not redirecting automatically or you don't want to wait.</a><br></center>";


 print "<script>";
    print " self.location='getList.php';"; // Comment this line if you don't want to redirect
          print "</script>";

      
	}
	
	// include "include/newsession.php";

//}	
	
}
else {
die ('error ' . mysql_error());
session_unset();
echo "<center><font face='Verdana' size='2' >Wrong Login. Use your correct  Login ID and Password and Try again!<br><br><input type='button' value='Retry' onClick='self.location=\"index.php\"'></center>";
}


//	}
?>


</body>

</html>
