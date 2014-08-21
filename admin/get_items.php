<?php
// The request is a JSON request.
// We must read the input.
// $_POST or $_GET will not work!

include "db.php";

//$data = file_get_contents("php://input");

//$objData = json_decode($data);

// perform query or whatever you wish, sample:


$query = "SELECT * FROM items";




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