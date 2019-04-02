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
  margin-left:-240px;
  width:90%;
}
#profile
{
  float:right;
  border-radius:50%;
  //width:50px;
  //height:50px;
   margin-top:-220px;
  margin-right:-300px;
  display:block;
}
#profileimage
{
  height:40px;
  width:40px;
  border-radius:50%;
  border:3px solid #ccc; 
  margin-right:-300px;
}
#h6
{
  padding-right:50px;
  margin-left:-50px;
}
</style>
<script>
function bigimage(x)
{
  x.style.height="100px";
  x.style.width="100px";
}
function normalimage(x)
{
  x.style.height="40px";
  x.style.width="40px";
}
</script>
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

 