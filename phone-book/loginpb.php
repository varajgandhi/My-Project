<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body" class="aa">
<div id="my_divition">  

 <?php
		    	   //variable declaration
				   $username=$_POST['username'];
				   $password=$_POST['password'];
				   //Database connection
				   $conn= new mysqli("localhost","root","","phonebook");

			       if($conn->connect_error)
			       {
			            die("connection failed:".$conn->connect_error);
			       }

				   //compare user credential details 
				   $sql =mysqli_query($conn,"SELECT memberid FROM members WHERE  username = '$username' AND password='$password'");
				   $number=mysqli_num_rows($sql);
				  
			       if($number>0)
						   
					{

								while ($row = mysqli_fetch_assoc($sql)) 
							{
			    				session_start();
			    				
			                    $id = $row['memberid'];

			                    $_SESSION['memberid'] = $id;         
			                  
			    			}
								
							    include('Controlpb.php');
					}
					else

							   echo"<h1> <br /><br /> Sorry : invalid entery <br /><br /></h1><a href=indexpb.php >
						       Go Back </a>";

			                  
     ?>
</div> 
</body>
</html>			 