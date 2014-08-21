<?php


include "db.php";




$query = "SELECT * FROM items";




$result = mysql_query($query) or die("Data not found."); 
$rows=array(); 
while($r=mysql_fetch_assoc($result))
{ 
$rows[]=$r;
}
header("Content-type:application/json"); 
echo json_encode($rows);

