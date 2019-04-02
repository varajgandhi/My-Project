<html>
<title>Student Book Project</title>
<body>
<div> 
<?php
session_start();
if(isset($_SESSION['memberid']))
{
     
      $conn = new  mysqli("localhost","root","","studentbook");
      if($conn->connect_error)
      {
           die("Unable to connect");
      } 
      //execute the SQL query and return records
      $sql = mysqli_query($conn,"SELECT * FROM contact  WHERE memberid='$id' ORDER BY fname ");
      if($sql)
      //execute the SQL query and return records
      $sql1 = mysqli_query($conn,"SELECT image,firstname,lastname FROM members  WHERE memberid='$id'");
      if($sql1)  ?>
<?php
      include('controlpb.php');
      echo "<h3 style='margin-left:300px;'> CONTACT DETAILS<h3>";
?>
<div id="profile">
<a href="memberpb.php" title="View Profile" style="text-decoration:none; color:orange;">
<?php
while($row = mysqli_fetch_assoc($sql1))
{
echo "<img src='images/".$row['image']."' id='profileimage'  onMouseOver='bigimage(this)' onMouseOut='normalimage(this)'/><br><div id='h6'><h6 style='color:hotpink;'>{$row['firstname']}&nbsp{$row['lastname']}</h6></div>";

}
?>
</a>
</div>
  <div id="table">
      <table padding-top="50px" border="3" bordercolor="olive" style= "background-color:#ccc; color: #761a9b;" style="width:100%">
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
          $sno=1;
          while( $row = mysqli_fetch_assoc($sql))
          {
              echo "<tr>
                      <td>{$sno}</td>
                      <td><img id='image' src='images/".$row['image']."'></td>
                      <td>{$row['fname']}</td>
                      <td>{$row['lname']}</td>
                      <td>{$row['phone']}</td>
                      <td>{$row['altphone']}</td>
                      <td>{$row['altphone1']}</td>
                      <td>{$row['altphone3']}</td>
                      <td>{$row['altphone']}</td>
                      <td>{$row['email']}</td>
                      <td><a href=\"update26062017.php?id=".$row['id']."\" style='color:red;'>Edit</a></td>
                      <td><a href=\"Delete_contactpb.php?id=".$row['id']."\"style='color:red;'>Delete</a></td>
                  </tr>\n";
                  $sno++;             
          }

}
         
?>
          </tbody>
          </table>
          </div>
</body>
</html>

 