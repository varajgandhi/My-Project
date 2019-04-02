<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<style>
td{  text-align:center; 
  }
th{  color:green; }
table{
        margin-left:-100px;
     }

#image
{
  height:auto;
  width:150px;
}
</style>
<body class="my_body">
<div id="my_divition"> 
<?php
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
      $sql = mysqli_query($conn,"SELECT * FROM members  WHERE memberid='$id' ORDER BY firstname ");
?>
      <table padding-top="50px" border="1" style= "background-color:#ccc; color: #761a9b;">
          <thead>
              <tr>
                  <th>Sno</th>
                  <th>Profile</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>EmailId</th>
                  <th>Mobile Number</th>
                  <th>Gender</th>
                  <th>DOB</th>
                  <th>Username</th>
                  <th>Password</th>
              </tr>
          </thead>
          <tbody>
<?php
          echo "<center><h3 style='align:center;'>MEMBER DETAILS<h3></center>";
          $sno=1;
          while($row = mysqli_fetch_assoc($sql))
          {
              echo "<tr>
                      <td>{$sno}</td>
                      <td><img id='image' src='images/".$row['image']."'></td>   
                      <td>{$row['firstname']}</td>
                      <td>{$row['lastname']}</td>
                      <td>{$row['emailid']}</td>
                      <td>{$row['phone']}</td>
                      <td>{$row['gender']}</td>
                      <td>{$row['dob']}</td>
                      <td>{$row['username']}</td>
                      <td>{$row['password']}</td>
                  </tr>\n";
                  $sno++;             
          }

}
         
?>
          </tbody>
          </table>
          <?php  echo"<center><a href='Controlpb.php' style='color:green;'><h3>Control Panel</h3></a></center>"; 
         ?>
</body>
</html>

 