<?php

$conn=new mysqli("localhost", "root", "","phonebook");

$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO contact VALUES('$imagetmp','$imagename')";

mysqli_query($conn,$insert_image);

?>