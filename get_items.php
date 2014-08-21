<?php
// The request is a JSON request.
// We must read the input.
// $_POST or $_GET will not work!

include "admin/db.php";

$sortby=$_GET['sorttype'];

if($sortby=="alpha")
$query = "SELECT * FROM items where active=1 order by title";

else
$query = "SELECT * FROM items where active=1 order by dateposted";




$result = mysql_query($query) or die("Data not found."); 
$rows=array(); 
while($r=mysql_fetch_assoc($result))
{ 
$rows[]=$r;
}
header("Content-type:application/json"); 
echo json_encode($rows);

// Check if the keywords are in our array
//if(in_array($objData->data, $values)) {
//	echo 'I have found what you\'re looking for!';
//}
//else {
//	echo 'Sorry, no match!';
//}