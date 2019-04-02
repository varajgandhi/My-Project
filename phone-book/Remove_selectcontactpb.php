<? session_start();?>
<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition">  
<?php
 	 include('home.php');
?>
	<center>
	 <div class="aa">
     <form action='After_removepb.php' method='post' ><br />
     <b><u>Please enter the following information about the contact you want to remove </u><br></b><br>      
	 <input type='text' name='fname' placeholder="Firstname" required /><br /><br />
	 <input type='text' name='lname' placeholder="Lastname" required /><br /><br />
	 <input type="submit" value='Remove'  />
	 </form>
	 </center> 
 				
  </div>
 </body>
 </html>