<html>
<head>
<style>
#h2
{
	margin-left:-100px;
}
#tab
{
	margin-left:-200px;
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
input[type="submit"]
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
</head>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<body class="my_body">
<?php
?>
				 <h2 id="h2">Remove Contact</h2>
				 <div id="tab">
				 <table border=3>
				 <form id="fm" action=delete_selectedcontactspbnew.php method=post>
				 <input type=submit value='Remove Selected Contact'  />&nbsp&nbsp&nbsp
				 </form>
				 <form action=Remove_allcontacts.php method=post>
				 <input type=submit value='Remove All Contacts'  />&nbsp&nbsp&nbsp
				 </form>
				 <input type="button" value="Home" onclick="window.location.href='Controlpb1.php'" />
				 </table>
				 </div>

</body>
</html>


	        