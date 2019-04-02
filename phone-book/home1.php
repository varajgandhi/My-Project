<?php
if(isset($_SESSION['memberid']))
{
      $id=$_SESSION['memberid'];

      $conn = new  mysqli("localhost","root","","phonebook");
      if($conn->connect_error)
      {
           die("Unable to connect");
      } 
      //execute the SQL query and return records
      $sql = mysqli_query($conn,"SELECT image,firstname,lastname FROM members  WHERE memberid='$id'");
      if($sql)
?>
<html> 
<head>
<style>
#b
{
	background-repeat:none;
	background-image: url(bgblack.jpg);
	background-size: 100%;
	//margin-top:200px;

}
#profile
{
	float:right;
	border-radius:50%;
	//width:50px;
	//height:50px;
	margin-top:-80px;
	margin-right:-260px;
}
#profileimage
{
	height:40px;
	width:40px;
	border-radius:50%;
	border:3px solid #ccc; 
}
</style>
<script>
function bigimage(x)
{
	x.style.height="100px";
	x.style.width="100px";
}
function normalimage(x)
{
	x.style.height="40px";
	x.style.width="40px";
}
function logout()
{
	var txt;
	//confirm("Do You Want To Logout!");
	if(confirm("Do You Want To Logout!")==true)
	{
		txt="Logout Sucessfully!";
		window.location.href='logoutpb.php';
	}
	else
	{
		txt="Stay on Login!";
	}
	 document.getElementById("demo").innerHTML = txt;		
}
</script>
</head>
<body id="b">
<div id="profile">
<a href="memberpb.php" title="View Profile" style="text-decoration:none; color:orange;">
<?php
while($row = mysqli_fetch_assoc($sql))
{
echo "<img src='images/".$row['image']."' id='profileimage' alt='profile' onMouseOver='bigimage(this)' onMouseOut='normalimage(this)'/>";
echo "<h5 style='color:hotpink;'>{$row['firstname']} {$row['lastname']}</h5>";
}
}
?>
</a>
</div>
<h2 style="text-align:center;  color:#009688; font-size:30px;">Control Panel</h2>


			<center>
				 <input type="button" value="Home" onclick="window.location.href='Controlpb2.php'" />&nbsp
				 <input type="button" value="Add Contact" onclick="window.location.href='addcontactimage.php'" />&nbsp
				 <input type="button" value="Show Contacts" onclick="window.location.href='Show_Contactnewpb.php'" />&nbsp
				 <input type="button" value="Search Contact" onclick="window.location.href='Search_for_contactpb.php '" />&nbsp
				 <input type="button" value="Remove Contact" onclick="window.location.href='Remove_contactpb1.php'" />&nbsp
				 <input type="button" value="Logout" onclick="javascript:logout()" /> 
			</center>				
				
</body>
</html>



	          
			
			  
				 
				

