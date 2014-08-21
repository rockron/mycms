<?php
ob_start();
?>
<?php


include "db.php";

$pid=$_GET['pid'];


$query = "SELECT * FROM items where itemID=$pid";




$result = mysql_query($query) or die("Data not found."); 
$rows=array(); 
while($r=mysql_fetch_assoc($result))
{ 
$rows[]=$r;
}
header("Content-type:application/json"); 
echo json_encode($rows);

