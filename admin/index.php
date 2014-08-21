<?php
ob_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My CMS - Login</title>
<link href="css/style.css" rel="stylesheet"/>
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"/>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<body topmargin="0" >
<div id="banner">MY CMS</div>
<div id="main">
 <div id="widget-container">
  <div class="widget-content">
   <div class="widget-title">
         <h3>Login</h3>
   </div>
   <div class="widget-text"><form action='loginck.php' method=post>
  <br />
<table border='0' cellspacing='2' cellpadding='2' align="center">
<tr >
<tr> <td  align="left" ><font face='verdana, arial, helvetica' size='2' align='center'>  <strong>Login ID: </strong></font></td><td  align="left"><font face='verdana, arial, helvetica' size='2' >
<input type ='text' name='userid' style="width:150px;" ></font></td></tr>

<tr> <td align="left" ><font face='verdana, arial, helvetica' size='2' align='center'>  <strong>Password: </strong></font></td><td  align="left"><font face='verdana, arial, helvetica' size='2' >
<input type ='password'  name='password'  style="width:150px;"></font></td></tr>

<tr>
  <td colspan='2' align='center'>&nbsp;</td>
</tr>
<tr> <td colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'> 
  <input type='submit' value='Submit'> <input type='reset' value='Reset'>
</font></td> </tr>

</table></center></form>
</div>
</div>
</div>
</div>

</body>
</html>
