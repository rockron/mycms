<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My CMS</title>
<link href="css/style.css" rel="stylesheet"/>
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"/>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



<script type="text/javascript">  /* attach a submit handler to the form */ 
	$(document).ready(function () {
get_list()

	});
function get_list(){
	
	 $.getJSON("get_items.php", function (data) {
                $.each(data, function (i, item) {
					var isactive=item.active;
					if(isactive==1){
				  $("#prod_list").append("<table border=1 class='list_table'><tr><td rowspan=3 width=80><img src='http://www.rockron.com/mycms/admin/photos/thumbs/"+item.image+"' /></td><td> " +item.title + "</td></tr><tr><td><strong>Price: </strong>"+item.price+"</td></tr><tr><td><strong>Description: </strong><br>"+item.description+"</td></tr></table><div style='float:left' id='edit_"+item.itemID+"'   class='btn' >Edit</div> <div id='deactivate_"+item.itemID+"'    class='btn' >Deactivate</div><br><br>");
					}
					else
					{
				 $("#prod_list").append("<table border=1 class='list_table'><tr><td rowspan=3 width=80><img src='http://www.rockron.com/mycms/admin/photos/thumbs/"+item.image+"' /></td><td> " +item.title + "</td></tr><tr><td><strong>Price: </strong>"+item.price+"</td></tr><tr><td><strong>Description: </strong><br>"+item.description+"</td></tr></table><div style='float:left' id='edit_"+item.itemID+"'   class='btn' >Edit</div> <div id='deactivate_"+item.itemID+"'    class='btn' >Activate</div><br><br>");
					
					}
				  
				  
				  $('#edit_' + item.itemID).click( function () {
				window.location.href = "editItem.php?pid="+item.itemID;
			});
			 $('#deactivate_' + item.itemID).click( function () {
				 var act
				 if(item.active==1)
				  act=0
				 else
				  act=1
				activate_item(item.itemID,act);
			});
				  
                });
            });
		

}
function activate_item(id,isactive){
	var itemid=id;
	var isactive=isactive;
	 $.getJSON("activate_items.php", 
	 {
		 pid:itemid,
		 isactive:isactive
		 },
	 function (data) {
                $.each(data, function (i, item) {
					location.reload();
				});
				
	 });
	
}
</script>
</head>

<body>
<div id="banner">MY CMS</div>
<div id="main">
 <div id="widget-container">
 <a href="logout.php" class="btn btn-default btn-lg">Logout</a>
  <div class="widget-content">
   <div class="widget-title">
         <h3>List of products</h3>
   </div>
   <div class="widget-text">
<div  id="prod_list" >




</div>
<a href="addItem.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-heart"></span> Add Item</a>

</div>
</div>
</div>
</div>

</body>
</html>
