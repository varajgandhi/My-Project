<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition" class="aa">  
			<center>
		 	<form action="Add_Registerpb.php" method="post" >
		     		<h1>Register form </h1><br />
		     		<p>
			 		<input type="text" name="username" id="username" placeholder="Provide Username!" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" /><br /><br />
			 		</p>
			 		<p><?php if(isset($errors['username1'])) echo $errors['username1']; ?></p>
            		<p><?php if(isset($errors['username2'])) echo $errors['username2']; ?></p>
            		<p>
					<input type="text" name="password" id="password" placeholder="Provide Password!" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" /><br /><br />
					</p>
					<p><?php if(isset($errors['password1'])) echo $errors['password1']; ?></p>
            		<p><?php if(isset($errors['password2'])) echo $errors['password2']; ?></p>
			 		<input type="submit" name="submit" value="Submit"  /> | <input type="button" value="Login" onclick="window.location.href='indexpb.php'" />
	  		</form>  
		   	</center>
</div> 
</body>
</html>