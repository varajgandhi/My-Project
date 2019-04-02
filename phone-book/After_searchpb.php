<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<style>
td{  text-align:center;  }
th{  color:green; }
#image
{
	height:auto;
	width:150px;
}
table
{

}
</style>
<body class="my_body">
<div id="my_divition">
<?php
$error='';
session_start();
if(isset($_SESSION['memberid']))
{
 	   $id=$_SESSION['memberid'];
       include('home.php');
	   $conn=new mysqli("localhost", "root", "","phonebook");
	   if($conn->connect_error)
       {
           die("Unable to connect");
       }
       else
       {	
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
			    $sql=mysqli_query($conn,"SELECT * FROM contact where fname='$fname' AND  (fname='$fname' AND lname='$lname') AND memberid='$id'"); 
				$number=mysqli_num_rows($sql);
				if($number>0)
				{ ?>
						<center>
					    <h3><b>The search result is :</b></h3>
					    </center>
					    <table  border="1" style= "background-color:#ccc; color: #761a9b; width:100%; margin-left:-100px;">
			    <?php   echo "<tr><th>Image</th>
			    			  <th>First name</th>
			    			  <th>Last name</th>
			    			  <th>Phone number</th>
			    			  <th>Alternate MobNo</th>
			    			  <th>Alternate MobNo1</th>
			    			  <th>Alternate MobNo2</th>
			    			  <th>Alternate MobNo3</th>
			    			  <th>Email</th></tr>"; 	
					    while( $row = mysqli_fetch_assoc( $sql ) )
					    {
					  		echo  "<tr><td><img id='image' src='images/".$row['image']."'></td>
					  		<td>{$row['fname']}</td> 
					  		<td>{$row['lname']}</td> 
					  		<td>{$row['phone']}</td>
					  		<td>{$row['altphone']}</td>
					  		<td>{$row['altphone1']}</td>
					  		<td>{$row['altphone2']}</td>
					  		<td>{$row['altphone3']}</td>
					  		<td>{$row['email']}</td> </tr>\n";		
					    }

                }
				else
				{
					
					 $error= "<b><span style='color:red;'>Sorry :</span>no contact found with Name= <span style='color:#33c3b6;'>$fname $lname !</span></b> ";
				}
		}
}
?><br>
<center><span style="color:orange;"><?php echo $error; ?></span></center>              		   			 
</div>
</body>
</html>