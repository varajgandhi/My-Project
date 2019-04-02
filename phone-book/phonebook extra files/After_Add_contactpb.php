<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition">  
<?php
session_start();

if(isset($_SESSION['memberid']))
{
				
       			include('Controlpb.php');
				$v_fname=$_POST['fname'];
				$v_lname=$_POST['lname'];
				$v_phone=$_POST['phone'];
				$id=$_SESSION['memberid'];
				
			    //Database connection establishment
				$conn=new mysqli("localhost", "root", "","phonebook");
                //Insert contacts into database and comparison opration
				$sql = mysqli_query($conn,  "SELECT * FROM contact WHERE phone ='$v_phone' OR (fname='$v_fname' AND  lname='$v_lname') AND memberid='$id'");
				
				
            	if(mysqli_num_rows($sql)>0)
            	{
                    	echo"contact exist!";

            	}
            	else
            	{

						$sql="INSERT INTO contact(fname,lname,phone,memberid) VALUES ('$v_fname','$v_lname','$v_phone','$id')";
				
		    			$result=mysqli_query($conn,$sql); 
					 
						echo " <br/> The contact added successfully  !  ";
					
				}

}
?>
		   		   				 
</div>
</body>
</html>
