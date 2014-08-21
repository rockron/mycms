<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My CMS</title>
<link href="css/style.css" rel="stylesheet"/>
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"/>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
function validateForm() {
    var x = document.forms["imgfrm1"]["price"].value;
    if (!isNumeric(x)) {
        alert("Must enter a number");
        return false;
    }
}
function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
</script>      
      
</head>

<body>
<div id="banner">MY CMS</div>
<div id="main">
 <div id="widget-container">
 <a href="getList.php" class="btn btn-default btn-lg">Back</a>
  <div class="widget-content">
   <div class="widget-title">
   
         <h3>Add product</h3>
   </div>
   <div class="widget-text">


<form action='upload-photo.php' method='post' enctype='multipart/form-data' id='imgfrm1' name='imgfrm1' onsubmit="return validateForm()">
<img src="http://www.documentarytube.com/wp-content/themes/wave/images/placeholder-video-tnail.jpg" />
<br>
 <input type='file' name='userfile' id='file' accept='image/*' style='width:420px;' class='send' /><br><br><table> <tr>    <td><label class='fieldprofile'><strong>Title:</strong></label></td>    <td><input name='ttle' id='ttle' type='text' class='textfield'  /></td></tr> <tr>    <td><label class='fieldprofile'><strong>Price:</strong></label></td>    <td>$ <input style="width:50px;" name='price' id='price' type='text' class='textfield'  /></td></tr> <tr>    <td><label class='fieldprofile'><strong>Description:</strong></label></td><td><textarea name='desc' id='desc'  class='textfield'  ></textarea></td></tr><tr><td colspan="2"><input type="submit" value="Submit" class="btn"  /> </td></tr></table></form></div>
 
</div>
</div>
</div>
</div> 
 </body>
</html>
