<?php
include("Add_Registerpb.php"); // Include loginserv for checking username and password
?> 
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
  body{
            background-color:#E0EEEE;
        }
.login{
width:360px;
margin:0 auto;
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
background-color:#00C5CD;
border:10px solid #ccc;
padding:10px 40px 25px;
margin-top:100px; 
}
input[type=password], input[type=text]{
width:99%;
padding:10px;
margin-top:8px;
border-radius:5px;
border:3px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
input[type=submit]{
width:100%;
background-color:#009;
color:#fff;
border:2px solid #06F;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px; 
}
</style>
</head>
<body>
<div class="login">
<h1 align="center">Signin</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="text-align:center;">
<input type="text" placeholder="Username" id="username" name="username"><br/><br/>
<input type="password" placeholder="Password" id="password" name="password"><br/><br/>
<input type="submit" value="Signin" name="submit">
<!-- Error Message -->
<span><?php echo $error; ?></span>
<p><a href="signuppb.php">Signup</a> | <a href="indexpb.php">Login</a></p>
</body>
</html>