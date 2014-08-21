<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>My CMS</title>
<link href="css/style.css" rel="stylesheet"/>
 <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css"
        rel="stylesheet"/>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(document).ready(function () {
		
		getInfo();
		
	});
	
 




 function getInfo(){
	 var imgurl='http://www.rockron.com/mycms/admin/photos/thumbs/';
	 var pid=$.urlParam('pid');
	  $.getJSON("edit_items.php",  {
        pid: pid,
      
    }, function (data) {
		   $.each(data, function (i, item) {
			  $("#frm").append("<form action='upload-photo.php' method='post' enctype='multipart/form-data' id='imgfrm1' name='imgfrm1'><img src='"+imgurl+item.image +"' /><br><input type='file' name='userfile' id='file' accept='image/*' style='width:420px;' class='send' /><table><tr><td><label class='fieldprofile'><strong>Title:</strong></label></td>    <td><input name='ttle' id='ttle' type='text' class='textfield' value='"+item.title+"'  /></td></tr> <tr>    <td><label class='fieldprofile'><strong>Price:</strong></label></td>    <td>$ <input style='width:50px;' name='price' id='price' type='text' class='textfield' value='"+item.price+"'  /></td></tr> <tr>    <td><label class='fieldprofile'><strong>Description:</strong></label></td><td><textarea name='desc' id='desc'  class='textfield'  >"+item.description+"</textarea></td></tr><tr><td colspan='2'><input type='submit' value='Submit' class='btn'  /><input type='hidden' value='"+item.itemID+"' name='pid' /></td></tr></table></form>"); 
			  
		   });
	  });
	 
	 
 }
 $.urlParam = function(name){
    var results = new RegExp('[\?&amp;]' + name + '=([^&amp;#]*)').exec(window.location.href);
    return results[1] || 0;
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
   
         <h3>Edit product</h3>
   </div>
   <div class="widget-text">
<div id="frm">
</div>
</div>
</div>
</div>
</div>

</body>
</html>