<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition">
<center>  
 <?php
 session_start();
 if(isset($_SESSION['memberid']))
 {
 	   $id1=$_SESSION['memberid'];
       include('Controlpb.php');
	   $conn= new mysqli("localhost", "root", "","phonebook");
	   $id=$_GET['id'];
	   $sql1 = mysqli_query($conn,"INSERT INTO contacts1 (SELECT * FROM contact WHERE id='$id')");
	   $sql= mysqli_query($conn,"DELETE FROM contact where id='$id'");
	   $result=mysqli_query($conn,$sql);
	   if(!$result)
	   {
		   	 header("location:Show_currentcontactspb.php");
		     
	   }
	   //include('Show_currentcontactspb.php'); 
	   echo " <br/> The contact removed successfully  !  ";
	   //echo"<a href='Controlpb.php' ><h4>control panel</h4></a>";		
}		
?>

		   
</center>		   				 
 </div>
 </body>
 </html>



