<html>
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition"> 
<?php

      $conn = new  mysqli("localhost","root","","phonebook");
      if($conn->connect_error)
      {

           die("Unable to connect");
      } 
      //execute the SQL query and return records
      $sql = mysqli_query($conn,"SELECT * FROM contact ORDER BY fname ");
?>
      <table padding-top="50px" align="center" border="1" style= "background-color:#ccc; color: #761a9b; margin: 0 auto;" style="width:100%">
          <thead>
              <tr>
                  <th width="10%">Sno</th>
                  <th width=30%>Firstname</th>
                  <th width=30%>Lastname</th>
                  <th width=60%>Mobilenumber</th>
                  <th width=100%>Edit Contact</th>
                  <th width=100%>Delet Contact</th>
              </tr>
          </thead>
          <tbody>
<?php
          echo "<h3 style='align:center;'> CONTACT DETAILS<h3> ";
          $sno=1;
          while( $row = mysqli_fetch_assoc( $sql ) )
          {
              echo "<tr><td>{$sno}</td><td>{$row['fname']}</td><td>{$row['lname']}</td><td>{$row['phone']}</td> <td><a  href='Edit_contactpb.php' style='color:red;'>Edit</a></td>
                    <td><a href='Remove_contactpb1.php' style='color:red;'>Delete</a></td></tr>\n";
              $sno++;
          }
         
?>
          </tbody>
          </table>
</body>
</html>