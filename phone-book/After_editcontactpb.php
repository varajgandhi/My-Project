<? session_start();?>
<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition">
<center>  
 <?php
	   $conn= new mysqli("localhost", "root", "","phonebook");
	   $fnamenew=$_POST['fnamenew'];
	   $lnamenew=$_POST['lnamenew'];
	   $phonenew=$_POST['phonenew'];
	   $id=$_GET['id'];
	   $sql= mysqli_query($conn,"UPDATE contact SET phone='$phonenew' fname='$fnamenew' lname='$lnamenew' where id='$id' ");
	  // include('Show_currentcontactspb.php'); 
	  // echo " <br/> The contact removed successfully  !  ";
	  // echo"<a href='Controlpb.php' ><h4>control panel</h4></a>";				
?>		   
</center>		   				 
 </div>
 </body>
 </html>
