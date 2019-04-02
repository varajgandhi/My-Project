<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<style>
td{  text-align:center; 
  }
th{  color:green; }
table{
        margin-left:-280px;
        width:80%;
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
      $sql = mysqli_query($conn,"SELECT * FROM contact  WHERE memberid='$id' ORDER BY fname ");
      if($sql)
?>
      <table padding-top="50px" border="3" bordercolor="olive" style= "background-color:#ccc; color: #761a9b; width:80%;">
          <thead>
              <tr>
                  <th>Sno</th>
                  <th>Profile</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Mobilenumber</th>
                  <th>Alternate MobNo</th>
                  <th>Alternate MobNo1</th>
                  <th>Alternate MobNo2</th>
                  <th>Alternate MobNo3</th>
                  <th>EmailID</th>
                  <th>Edit Contact</th>
                  <th>Delete Contact</th>
              </tr>
          </thead>
          <tbody>
<?php
          echo "<center><h3 style='align:center;'> CONTACT DETAILS<h3></center>";
          $sno=1;
          while( $row = mysqli_fetch_assoc($sql))
          {
              echo "<tr>
                      <td>{$sno}</td>
                      <td><img id='image' src='images/".$row['image']."'></td>   
                      <td>{$row['fname']}</td><td>{$row['lname']}</td><td>{$row['phone']}</td>
                      <td>{$row['altphone']}</td>
                      <td>{$row['altphone1']}</td>
                      <td>{$row['altphone2']}</td>
                      <td>{$row['altphone3']}</td>
                      <td>{$row['email']}</td>
                      <td><a href=\"update26062017?id=" .$row['id']."  \" style='color:red;'>Edit</a></td>
                      <td><a href=\"Delete_contactpb.php?id=".$row['id']."\"style='color:red;'>Delete</a></td>
                  </tr>\n";
                  $sno++;             
          }

}
         
?>
          </tbody>
          </table>
          <?php  echo"<center><a href='Controlpb2.php' style='color:orange;'><h3>Control Panel</h3></a></center>"; 
         ?>
</body>
</html>

 