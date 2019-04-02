<?php
session_start();
$error='';
$msg = '';
if(isset($_SESSION['memberid']))
{
if(isset($_POST['submit']))
{
   /* if($_SERVER['REQUEST_METHOD']=='POST')
    {
                $image = $_FILES['image']['tmp_name'];
                $img = file_get_contents($image);
                $con = mysqli_connect('localhost','root','','phonebook') or die('Unable To connect');
                $sql = "insert into contact (image) values(?)";
             
                $stmt = mysqli_prepare($con,$sql);
             
                mysqli_stmt_bind_param($stmt, "s",$img);
                mysqli_stmt_execute($stmt);
             
                $check = mysqli_affected_rows($con);
                if($check==1)
                {
                    $msg = 'Successfullly UPloaded';
                }
                else
                {
                    $msg = 'Could not upload';
                }*/
       
                $v_fname=$_POST['firstname'];
                $v_lname=$_POST['lastname'];
                $v_phone=$_POST['phone'];
                $v_altphone=$_POST['altphone'];
                $v_email=$_POST['email'];
                $id=$_SESSION['memberid'];
               

                //Database connection establishment
                $conn=new mysqli("localhost", "root", "","phonebook");
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                //Insert contacts into database and comparison opration
                $sql = mysqli_query($conn,  "SELECT * FROM contact WHERE (email='$v_email' OR phone = '$v_phone' OR altphone='$v_altphone' OR (fname= '$v_fname' AND  lname='$v_lname')) AND memberid='$id'");

                if(mysqli_num_rows($sql)>0)
                {
                        $error="contact exist!";

                }
                else
                {

                              $sql="INSERT INTO contact(image,fname,lname,phone,altphone,email,memberid) VALUES ('$image','$v_fname','$v_lname','$v_phone','$v_altphone','$v_email','$id')";

                            $result=mysqli_query($conn,$sql); 

                              $error="The contact added successfully!";
                }

        //}
    }
}
?>
    <html>
    <link rel="stylesheet" href="my_layout.css" type="text/css" />
    <title>Phone Book Project</title>
    <script type="text/javascript">
    var i=1;
    function addRow(tableID) 
    {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            if(rowCount < 5){                            // limit the user from creating fields more than your limits
            var row = table.insertRow(rowCount);
            var colCount = table.rows[0].cells.length;
            for(var i=0; i <colCount; i++) {
            var newcell = row.insertCell(i);
            newcell.innerHTML = table.rows[0].cells[i].innerHTML;
    }
    }else
    {
         alert("Maximum Passenger per ticket is 5");
               
    }
}
    </script>
    <style>
    .button{
        height:3px;
        width:3px;
    }
    </style>

    <body class="my_body">
        <div id="my_divition">
            <center>
                <?php include('home.php'); ?>
                    <div class="aa">
                        <br><b><u> Fill the following information to add new contact:</b> </u>
                        <br>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' enctype="multipart/form-data" autocomplete="off">
                            <br/>
                            <p>
                                <input type="text" name="firstname" id="firstname" placeholder="Enter Firstname!" minlength="2" required/>
                                <br />
                            </p>
                            <p>
                                <input type="text" name="lastname" id="lastname" placeholder="Enter lastname!" minlength="2" required/>
                                <br />
                            </p>
                            <p>
                                <input type="tel" name="phone" id="phone" placeholder="Enter Mobilenumber!" minlength='10' maxlength='10' required/>
                                <br />
                            </p>
                            <p id="altphone">
                              <input  type="tel" name="altphone" id="altphone" placeholder="Enter Alternate Mobilenumber!" minlength='10' maxlength='10'> 
                              <input type="button" name="altphonedynamic" id="altphone1" value="+"  onClick="addRow('dataTable')" >
                              <br/>
                            </p>
                             <p>
                                <input type="email" name="email" id="email" placeholder="Enter Emailid!" required/>
                                <br />
                            </p>
                            </div>
                            <div id="filediv">
                                <form   method="POST" action="uploadimage.php" enctype="multipart/form-data">
                                <input type="file" name="myimage"><br>
                                <input type="submit" name="submit_image" value="Upload Profile">
                                </form>
                            </div><br/>
                            <div class="aa" >
                            <input type="submit" name="submit" value="Submit" />
                            <br>
                            <br>
                            <span><?php echo $error; ?></span>
                    </div>
                    </form>
            </center>
        </div>
    </body>
    </html>

