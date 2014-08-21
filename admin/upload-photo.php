<?php
ob_start();
?>
<?php 


include "db.php";

if ( isset($_POST['pid']))
$pid=$_POST['pid'];

	
	$ttle=mysql_escape_string($_POST['ttle']);
	$price=mysql_escape_string($_POST['price']);
	$desc=mysql_escape_string($_POST['desc']);
	
 // Configuration - Your Options
      $allowed_filetypes = array('jpg','jpeg','png', 'JPG', 'JPEG', 'PNG'); // These will be the types of file that will pass the validation.
      $max_filesize = 102582912; // Maximum filesize in BYTES (currently 0.5MB).
      $upload_path = 'photos/'; // The place the files will be uploaded to (currently a 'files' directory).
	  
		 // Get the name of the file (including file extension).
   		//$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=''  ){
	
	$filename = $_FILES['userfile']['name'];
   $ext = pathinfo($filename, PATHINFO_EXTENSION);
   $filename=$userid."_photo".rand().".".$ext;
		
	 // Check if the filetype is allowed, if not DIE and inform the user.
   if(!in_array($ext,$allowed_filetypes)){
         echo $ext . "<br>";
   //$q=mysql_query("DELETE FROM pictures WHERE bandid='$userid' AND pid='$photoid'");
      die("<font color='red' >The file you attempted to upload is not allowed.</font><br><input type='button' value='Back' onClick='self.location=\"battle.php\"'>");
   }
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize){
	 //  $q=mysql_query("DELETE FROM pictures WHERE bandid='$userid' AND pid='$photoid'");
      die("<font color='red' >The file you attempted to upload is too large.</font><br><input type='button' value='Back' onClick='self.location=\"battle.php\"'>");
   }
	
  //$q=mysql_query("SELECT photo FROM profiles WHERE uid= $userid");

	//while($row = mysql_fetch_array($q))
	//{
	//$fname=$row['photo'];	
	//}
	unlink("photos/".$fname);
	unlink("photos/thumbs/".$fname);
	  

$target_path = 'photos/';

  if(!is_writable($target_path)){
	  // $q=mysql_query("DELETE FROM pictures WHERE bandid='$userid' AND pid='$photoid'");
      die("<font color='red' >You cannot upload to the specified directory, please CHMOD it to 777.</font><br><input type='button' value='Back' onClick='self.location=\"getList.php\"'>");
   }
	  
$target_path = $target_path . basename($filename); 

$thumbs_path = 'photos/thumbs/';

   if(!is_writable($thumbs_path)){
	  // $q=mysql_query("DELETE FROM pictures WHERE bandid='$userid' AND pid='$photoid'");
      die("<font color='red' >You cannot upload to the specified directory, please CHMOD it to 777.</font><br><input type='button' value='Back' onClick='self.location=\"getList.php\"'>");
   }
	  
$thumbs_path = $thumbs_path . basename($filename);


  // Check if we can upload to the specified path, if not DIE and inform the user.
 
	  
	   // Check if we can upload to the specified path, if not DIE and inform the user.


if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path)) {
  try
{
        /*** the image file ***/
        $image = $target_path;

        /*** a new imagick object ***/
        $im = new Imagick();

        /*** ping the image ***/
        $im->pingImage($image);

        /*** read the image into the object ***/
        $im->readImage( $image );

        /*** thumbnail the image ***/
        $im->thumbnailImage(128, null );

        /*** Write the thumbnail to disk ***/
        $im->writeImage($target_path);
		
		$im->thumbnailImage( 128, null );
		$im->cropImage( 128, 128, 0, 0 );
        /*** Write the thumbnail to disk ***/
        $im->writeImage($thumbs_path);
        /*** Free resources associated with the Imagick object ***/
        $im->destroy();
		
        
		if ( isset($_POST['pid']))

		{
	$pid=$_POST['pid'];
	$sql = "update items set title='$ttle',price=$price,description='$desc',image='$filename' where itemID=$pid";
	$result = mysql_query($sql); 
	if($result){
	header("location:getList.php");
	exit();
	}
	else
	{
	echo "fail";
	}
	}
else{
	$sql = "INSERT INTO items (title,price, description,image) values ('".$ttle."','".$price."','".$desc."','".$filename."')";
	$result = mysql_query($sql);  
		
	if($result){
	header("location:getList.php");
	exit();
	}
	else
	{
	echo "fail";
	}
}

}

catch(Exception $e)
{		
		
        echo $e;
}
}
}
else if ( isset($_POST['pid']))

{
	$pid=$_POST['pid'];
	$sql = "update items set title='$ttle',price=$price,description='$desc' where itemID=$pid";
	$result = mysql_query($sql);  
		
	if($result){
	header("location:getList.php");
	exit();
	}
	else
	{
	echo "fail";
	}
	
}
else
die("<div align='center'><font color='red' size='4' >You need to upload an image</font><br><br><br><input type='button' value='Back' style='width:100px;height:50px;'  onClick='self.location=\"addItem.php\"'></div>");



//}



?>

