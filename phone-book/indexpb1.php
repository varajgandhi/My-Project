 <?php
 $error='';
 if(isset($_POST['submit']))  
{
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
								
							    header('location:Controlpb.php');
					}
					else
					{
						$error="Username or Password is Incorrect!";
					}
					
		
}
 ?>			 
<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<style>
#input
{
	text-align:center;

}
</style>
<body class="my_body">
<div id="my_divitionlogin" class="aa">  
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
   <center>
   				<h1> Wellcome To Your Phone Book </h1><br />
				<input id="input" type="text" placeholder="Username" id="username" name="username" required><br/><br/>
				<input id="input" type="password" placeholder="Password" id="password" name="password" required><br/><br/>
				<input id="input" type="submit" value="Login" name="submit"><br><br>
				<!-- Error Message -->
				<span><?php echo $error; ?></span>
  </form>  
  <h5>Sign Up Successful!</h5><br />
  </center>
  </div>
</body>
</html>