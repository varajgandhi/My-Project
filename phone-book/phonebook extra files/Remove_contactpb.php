<? session_start();?>
<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
        <div id="my_divition">  
	
 <?php
 include('Controlpb.php');
      echo "  <form action='After_removepb.php' method='post' ><br />
     <b><u>Please enter the following information about the contact you want to remove :</u><br></b><br/>
     <b>First name : </b> <br />
	 <input type='text' name='fname'/><br /><br />
	 <b>Last name : </b><br />
	 <input type='text' name='lname'/><br /><br />
 
	 <input type=submit value='Remove this contact'  />
	  </form>   ";
	  
	  
	  ?>
  </div>
 </body>
 </html>