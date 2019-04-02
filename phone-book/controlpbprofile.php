<?session_start()?>
<html> 
<head>
<style>
#hc
{
	text-align:center; 
	color:red;
	font-size:30px;

}
#b
{
	background-repeat:none;
	background-image: url(background1.jpg);
	background-size: 100%;
	//margin-left:150px;
}
#profile
{
	float:right;
	border-radius:50%;
	//width:50px;
	//height:50px;
	margin-top:-50px;
	margin-right:-250px;
}
#profileimage
{
	height:60px;
	width:60px;
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
	x.style.height="60px";
	x.style.width="60px";
}
</script>
</head>
<body id="b">
<div id="profile">
<a href="vieprofile.php" title="View Profile">
<img src="phone44.png" id="profileimage" alt="profile" onMouseOver="bigimage(this)" onMouseOut="normalimage(this)"/>
</a>
</div>

			<div id="div">
			<h2 id="hc">Control Panel</h2>
			<center>
				 <input type="button" value="Add Contact" onclick="window.location.href='addcontactimage.php'" />&nbsp
				 <input type="button" value="Show Contacts" onclick="window.location.href='Show_Contactnewpb.php'" />&nbsp
				 <input type="button" value="Search Contact" onclick="window.location.href='Search_for_contactpb.php '" />&nbsp
				 <input type="button" value="Remove Contact" onclick="window.location.href='Remove_contactpb1.php'" />&nbsp
				 <input type="button" value="Logout" onclick="window.location.href='logoutpb.php'" /> 
			</center>				
			</div>
</body>
</html>


	          
			
			  
				 
				

