<? session_start();?>
<html>
<head>
<style>
#my_divition
{
	margin-top:100px;
}
</style>
</head>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition">  
	
<?php
 		include('home.php');
?>	 
	 <center>
	 <div class="aa">
     <form action='After_searchpb.php' method='post' ><br />
     <b><u>Please enter the following information about the contact you want to find </u><br></b><br>      
	 <input type='text' name='fname' placeholder="Firstname" required /><br /><br />
	 <input type='text' name='lname' placeholder="Lastname" required /><br /><br />
	 <input type=submit value='Search'  />
	 </form>
	 </div>
	 </center>
	  
	  
</div>
</body>
</html>


