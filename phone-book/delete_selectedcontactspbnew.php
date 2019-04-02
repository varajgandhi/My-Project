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
#delete
{
  color:white;
  cursor:pointer;
  background-color:red;
}
table{
        margin-left:-240px;
     }
</style>
<body class="my_body">
<div id="my_divition"> 
<?php
$error="";
session_start();
if(isset($_SESSION['memberid']))
{
      $id=$_SESSION['memberid'];

      $conn = new  mysqli("localhost","root","","phonebook");
      if($conn->connect_error)
      {
           die("Unable to connect");
      } 
      //execute the SQL query and return records
  if(isset($_POST['delete']))
        {
            $count='';
            if(isset($_POST['checkbox']))
            {
            $count=count($_POST['checkbox']);
            }
            for($i=0;$i<$count;$i++)
            {
                 $id1=$_SESSION['memberid'];
                // include('home.php');
                 $conn= new mysqli("localhost", "root", "","phonebook");
                 $id=$_POST['checkbox'][$i];
                 $sql1 = mysqli_query($conn,"INSERT INTO contacts1 (SELECT * FROM contact WHERE id='$id')");
                 $sql= mysqli_query($conn,"DELETE FROM contact where id='$id'");
                 $result=mysqli_query($conn,$sql);
            }

          if(!$result)
          {
             header("location:delete_selectedcontactspbnew.php");
              $error="<span style='color:lightgreen;'>The contact removed successfully!</span>";  
           // include('Show_currentcontactspb.php'); 
          }
         //include('Show_currentcontactspb.php'); 
                  
         //echo"<a href='Controlpb.php' ><h4>control panel</h4></a>"; 
           
        }

      $sql = mysqli_query($conn,"SELECT * FROM contact  WHERE memberid='$id' ORDER BY fname ");
      if($sql)


?>
      <table padding-top="50px" width="90%" border="3" bordercolor="olive" style= "background-color:#ccc; color: #761a9b;">
          <thead>
              <tr>
                  <th>Sno</th>
                  <th>Delete</th>
                  <th>Profile</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Mobilenumber</th>
                  <th>Alternate MobNo</th>
                  <th>Alternate MobNo1</th>
                  <th>Alternate MobNo2</th>
                  <th>Alternate MobNo3</th>
                  <th>EmailID</th>
              </tr>
          </thead>
          <tbody>
          <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>

<?php
  
          include('home.php');
          echo "<h3 style='text-align:center;'> CONTACT DETAILS<h3> ";
          $sno=1;

          while( $row = mysqli_fetch_assoc($sql))
          {
              echo "<tr>
                      <td>{$sno}</td>
                      <td>   
                      <input  name='checkbox[]' type='checkbox' id='checkbox[]' 
                      value=".$row['id']."></td>
                      <td><img id='image' src='images/".$row['image']."'></td>
                      <td>{$row['fname']}</td>
                      <td>{$row['lname']}</td>
                      <td>{$row['phone']}</td>
                      <td>{$row['altphone']}</td>
                      <td>{$row['altphone1']}</td>
                      <td>{$row['altphone2']}</td>
                      <td>{$row['altphone3']}</td>
                      <td>{$row['email']}</td>
                  </tr>\n";
                  $sno++; 
          }
        if($sno>0) {
          echo"<tr><td></td><td colspan:'1' style='color:red;'><input  name='delete' type='submit' id='delete' value='Delete'></form></td></tr>\n</form>" ;
        }
        else {
         // echo "<tr><td colspan='11'>There is no contact</td></tr>";
            $error="<span style='color:orange;'>There is no contact!</span>";
        }

      
}
         
?>
          </tbody>
          </table></br> <center><b><span><?php echo $error; ?></span></b></center> 
           

</body>
</html>