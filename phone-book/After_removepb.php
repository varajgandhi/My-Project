<? session_start();?>
<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition">  
 <?php
 session_start();
 if(isset($_SESSION['memberid']))
 {
 	   $id=$_SESSION['memberid'];
       include('home.php');
	   $conn= new mysqli("localhost", "root", "","phonebook");
      			
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
			 	$sql1 = mysqli_query($conn,"INSERT INTO contacts1 select * from contact where fname='$fname' AND lname='$lname' AND memberid='$id'");
			    $sql= mysqli_query($conn,"DELETE FROM contact where fname='$fname' AND lname='$lname' AND memberid='$id'");
                if(mysqli_affected_rows($conn))
                { 
				
					 echo " <center><br/> The contact removed successfully!</center>";

				}
				else
				{

					 echo" <center><br/>The contact is not exist!</center>";
				}
	
				
 }
 ?>		   				 
 </div>
 </body>
 </html>