<html>
<head>
<style>
      #my_divition
      {
            margin-right:300px;
      }
</style>
</head>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition">  
<?php
session_start();
$error='';
if(isset($_SESSION['memberid']))
{
 			$id=$_SESSION['memberid'];
	   		$conn= new mysqli("localhost", "root", "","phonebook");
	   		$sql1 = mysqli_query($conn,"INSERT INTO contacts1  (SELECT * FROM contact WHERE memberid='$id')");				 
	        $sql= mysqli_query($conn,"DELETE FROM contact WHERE memberid='$id'"); 
            //$result=mysqli_query($conn,$sql); 
            if(mysqli_affected_rows($conn))
            {
            	  include('removeallcontacts.php');	 
		        $error="The contact removed successfully!";	
            }
            else
            {
            	  include('removeallcontacts.php');	 
		        $error="There is no contact!";
            }
            $conn->close();
            			 
}
 ?>
<br/> <center><span><?php echo $error; ?></span></center>       
</div>
</body>
</html>