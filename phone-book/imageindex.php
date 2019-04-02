<style type="text/css">
<!--
body
{
background-color:pink;
}
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;

border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:green;
height: 34px;
font-size:20px;
color:red;
}

p{
font-size:20px;
color:blue;

}
lable{
font-size:20px;
color:blue;

}
img{
height: 225px;
}
#tbl
{
display:inline;
}
-->
</style>
<table align="center">
<form action="addexec.php" method="post" enctype="multipart/form-data" name="addroom">
 <tr><td><lable>Select Photo</lable></td>
 <td><input type="file" name="image" class="ed"></td></tr>
 <tr><td><lable>Photo Name</lable></td>
 <td><input name="caption" type="text" class="ed" id="brnu" /></td></tr>
 <tr><td></td><td><input type="submit" name="Submit" value="Upload" id="button1" /></td></tr>
 </form>
</table>
<p>Photos List:-</p>
<br />
<br />


<?php
include('config.php');
$result = mysql_query("SELECT * FROM photos");
while($row = mysql_fetch_array($result))
{

echo '<table id="tbl">' .'<tr><td><img src="'.$row['location'].'">'.'</td></tr><tr><td>'.$row['caption'].' </td></tr></table>';
}
?>


<!--
<?php
include('config.php');
$result = mysql_query("SELECT * FROM photos");
while($row = mysql_fetch_array($result))
{
echo '<div id="imagelist">';
echo '<p><img src="'.$row['location'].'"></p>';
echo '<p id="caption">'.$row['caption'].' </p>';
echo '</div>';
}
?>
-->