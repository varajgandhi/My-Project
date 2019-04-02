<?php
$error="";
session_start();
    $v_fname=" ";
	$v_lname=" ";
	$v_phone=" ";
	$v_altphone="";
	$v_altphone1="";
	$v_altphone2="";
	$v_altphone3="";
	$v_email="";
	$hiddenid=" ";

 if(isset($_POST['Submit']))
 {
       $v_fname=$_POST['fname'];
	   $v_lname=$_POST['lname'];
	   $v_phone=$_POST['phone'];
	   $v_altphone=$_POST['altphone'];
	   $v_altphone1=$_POST['altphone1'];
	   $v_altphone2=$_POST['altphone2'];
	   $v_altphone3=$_POST['altphone3'];
	   $v_email=$_POST['email'];
	   $hiddenid=$_POST['id']; 
	   $imagename=$_FILES['image']['name'];
	   $filetype=$_FILES['image']['type'];
	   $id=$_SESSION['memberid']; 
	   $conn= new mysqli("localhost", "root", "","phonebook");
	   if(isset($_POST['id']))
	   {
		          $sql = "SELECT * FROM contact WHERE id='$id'";
                  
                  $sql1 = mysqli_query($sql);

                  $sql2 = mysqli_fetch_array($sql1);

                  if('$v_email'==$sql2['email'] || '$v_phone'==$sql2['phone'] || '$v_fname'==$sql2['fname'] || ('$v_fname'==$sql2['fname'] && '$v_lname'==$sql2['lname']))
	   		/*$query = mysqli_query($conn,"SELECT * FROM contact WHERE (email='$v_email' OR phone = '$v_phone' OR  fname= '$v_fname' OR (fname= '$v_fname' AND  lname='$v_lname')) AND memberid='$id' AND id='$hiddenid'");
	   		if(mysqli_num_rows($query)>0)*/
	   		{
	   			header("location:Show_currentcontactspb.php");
	   			$error="<span style='color:lightgreen;'>Contact exist!</span>"; 
	   		}
	   		else if($filetype=='image/jpeg' or $filetype=='image/png' or $filetype=='image/gif')
		   	{
				$folder="images/";
				move_uploaded_file($_FILES["image"]["tmp_name"],"$folder".$_FILES["image"]["name"]);	
	   			$sql= mysqli_query($conn,"UPDATE contact SET  fname='$v_fname',lname='$v_lname',phone='$v_phone', altphone='$v_altphone',altphone1='$v_altphone1',altphone2='$v_altphone2',altphone3='$v_altphone3',email='$v_email',image='$imagename' WHERE id='$hiddenid'");
	   			$result=mysqli_query($conn,$sql);
	   			if(!$result)
	   			{
		   	 		header("location:Show_currentcontactspb.php");
		   	 		$error="<span style='color:lightgreen;'>Contact Updated Successfully</span>";  
	   			} 
	       				
	       	}
	        else
	       	{
					$sql= mysqli_query($conn,"UPDATE contact SET  fname='$v_fname',lname='$v_lname',phone='$v_phone', altphone='$v_altphone',altphone1='$v_altphone1',altphone2='$v_altphone2',altphone3='$v_altphone3',email='$v_email' WHERE id='$hiddenid'");
	   				$result=mysqli_query($conn,$sql);
	   				if(!$result)
	   				{
	   					header("location:Show_currentcontactspb.php");
	   					$error="<span style='color:lightgreen;'>Contact Updated Successfully</span>";
	   				}
	   		
		   	}
	   	
			  
	   	}
	   		
 }

 if(isset($_GET['id']))
 {
    $id=$_GET['id']; 
    $conn= new mysqli("localhost", "root", "","phonebook");
 	$sql= mysqli_query($conn,"SELECT * from contact WHERE id='$id'");
 	while($fieldinfo=mysqli_fetch_object($sql))
    {
       $v_fname=$fieldinfo->fname;
	   $v_lname=$fieldinfo->lname;
	   $v_phone=$fieldinfo->phone;
	   $v_altphone=$fieldinfo->altphone;
	   $v_altphone1=$fieldinfo->altphone1;
	   $v_altphone2=$fieldinfo->altphone2;
	   $v_altphone3=$fieldinfo->altphone3;
	   $v_email=$fieldinfo->email;
	   $imagename=$fieldinfo->image;
	   $hiddenid=$fieldinfo->id; 
    }
    mysqli_free_result($sql);
 } 
   
?>
<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<head>
<div id="my_divition">  
<style type="text/css">
input[type=tel], input[type=text], input[type=email] {
width:50%;
padding:10px;
margin-top:8px;
border-radius:5px;
border:3px solid #ccc;
padding-left:80px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
input[type=file]
{
width:50%;
padding:10px;
margin-top:8px;
padding-left:5px;
font-size:15px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
#altphone #addaltphone
{
    height:30px;
    width:30px;
    margin-left:15px;
    cursor:pointer;
}
#altphone input[type="button"]
{
    height:30px;
    width:30px;
    margin-left:15px;
    cursor:pointer;
}
input[type=submit]{
width:20%;
background-color:#009;
color:#fff;
border:2px solid #06F;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px; 
}
#button
{
width:20%;
background-color:#009;
color:#fff;
border:2px solid #06F;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px; 
}
input[type=reset]{
width:20%;
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
<body class="my_body">
     <center>      
     <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST' enctype="multipart/form-data" ><br/>
     		 <u><h2>Edit Contact!</h2></u>  
     		 <input type="hidden" id="hiddenid"  name="id" value="<?php echo $hiddenid; ?>"/><br/></br>
		                    
			 <input type="text"  id="fname" name="fname" value="<?php echo "$v_fname" ?>"  minlength="2" required/><br /><br />        
			
			 <input type="text"  id="lname" name="lname" value="<?php echo "$v_lname" ?>" minlength="2" required/><br /><br />
			
			 <input type="tel"  id="phone" name="phone" value="<?php echo "$v_phone" ?>" minlength="10" maxlength="10" required/><br /><br />
             
             <input type="tel" name="altphone" id="altphone1"  value="<?php echo "$v_altphone" ?>" minlength='10' maxlength='10' required="tel"><br/><br/>
             
             <input type="tel" name="altphone1" id="altphone1" placeholder="Enter Alternate Phonenumber1" value="<?php echo "$v_altphone1" ?>" minlength='10' maxlength='10'><br/><br/>
             
             <input type="tel" name="altphone2" id="altphone1" placeholder="Enter Alternate Phonenumber2" value="<?php echo "$v_altphone2" ?>" minlength='10' maxlength='10'><br/><br/>
             
             <input type="tel" name="altphone3" id="altphone1" placeholder="Enter Alternate Phonenumber3" value="<?php echo "$v_altphone3" ?>" minlength='10' maxlength='10'><br/><br/>

			 <input type="email"  id="email" name="email" value="<?php echo "$v_email" ?>"  required/><br /><br />

			 <input type="file"   id="file" name="image"  value="<?php  echo "$imagename" ?>" /><br/><br/>

			 <input type="submit" value="Update" name="Submit" /> <input type="button" id="button" value="Home" onclick="window.location.href='Controlpb.php'" /><br/><br />
	
			  <p><span><?php echo $error; ?></span></p>
	 </form>
	 </center>
 </div>
 </body>
 </html>
 

    