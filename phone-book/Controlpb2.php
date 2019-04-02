<?session_start()?>
<html> 
<head>
<style>
#hc
{
	text-align:center; 
	color:#33c3b6;
	font-size:30px;

}
#b
{
	background-repeat:none;
	background-image: url("bgblack.jpg");
	background-size: 100%;
	//margin-left:150px;
	margin-top:200px;
}
input[type="button"]
{
	height:30px;
	width:auto;
	cursor:pointer;
	color:white;
	background-color:goldenrod;
	border:0;
    border-radius:5px;
    border:3px solid  #058d9e;
    border-radius:5px;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    -moz-border-radius:5px;
    font-weight:bold;
}
</style>
<script>
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
			<div id="div">
			<h2 id="hc">Control Panel</h2>
			<center>
				 <input type="button" value="Add Contact" onclick="window.location.href='addcontactimage.php'" />&nbsp
				 <input type="button" value="Show Contacts" onclick="window.location.href='Show_Contactnewpb.php'" />&nbsp
				 <input type="button" value="Search Contact" onclick="window.location.href='Search_for_contactpb.php '" />&nbsp
				 <input type="button" value="Remove Contact" onclick="window.location.href='Remove_contactpb1.php'" />&nbsp
				 <input type="button" value="Logout" onclick="javascript:logout()" /> 
			</center>				
			</div>
</body>
</html>


	          
			
			  
				 
				

