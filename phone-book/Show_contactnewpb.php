<html>
<head>
<style>
#b
{
	background-repeat:none;
	background-image: url(bgblack.jpg);
	background-size: 100%;
}
#div
{
	margin-top:200px;
}
#div #h2
{
	color:#009688;
	font-size:30px;
}
input[type="button"]
{
	height:40px;
	width:auto;
	cursor:pointer;
	color:white;
	background-color:goldenrod;
	border:0;
    border-radius:5px;
    border:3px solid #058d9e;
    border-radius:5px;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    -moz-border-radius:5px;
    font-weight:bold;
}
input[type="submit"]
{
	height:40px;
	width:auto;
	cursor:pointer;
	color:white;
	background-color:goldenrod;
	border:0;
    border-radius:5px;
    border:3px solid #058d9e;
    border-radius:5px;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    -moz-border-radius:5px;
     font-weight:bold;
}


</style>
</head>
<center>
<body id="b">
<?php
?>				 <div id="div">
				 <h2 id="h2">Show Contacts</h2>
				 <table border=3>
				 <input type="button" value="Home" onclick="window.location.href='Controlpb2.php'" />&nbsp
				 <form action=Show_currentcontactspb.php method=post>
				 <input type=submit value='Show Current Contacts'  />&nbsp&nbsp&nbsp
				 </form>
				 <form action=Show_deletedcontactspb.php method=post>
				 <input type=submit value='Show Deleted Contacts'  />&nbsp&nbsp&nbsp
				 </form>
				 </table>
				 </div>				
</body>
</center>
</html>


	        