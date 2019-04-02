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
                //storing all necessary data into the respective variables.
                $file = $_FILES['file'];
                $file_name = $file['name'];
                $file_type = $file ['type'];
                $file_size = $file ['size'];
                $file_path = $file ['tmp_name'];
                $v_fname=$_POST['firstname'];
                $v_lname=$_POST['lastname'];
                $v_phone=$_POST['phone'];
                $v_altphone=$_POST['altphone'];
                $v_email=$_POST['email'];
                $id=$_SESSION['memberid'];


                //Restriction to the image. You can upload any types of file for example video file, mp3 file, .doc or .pdf just mention here in OR condition

              
                //Database connection establishment
                $conn=new mysqli("localhost", "root", "","phonebook");
                //Insert contacts into database and comparison opration
                if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=614400)

                if(move_uploaded_file ($file_path,'images/'.$file_name))//"images" is just a folder name here we will load the file.
                $query=mysqli_query("insert into contact(image)values('$file_name')");//mysql command to insert file name with extension into the table. Use TEXT datatype for a particular column in table.
                 
                if($query==true)
                {
                    echo "File Uploaded";
                }
                $sql = mysqli_query($conn,  "SELECT * FROM contact WHERE (email='$v_email' OR phone = '$v_phone' OR altphone='$v_altphone' OR (fname= '$v_fname' AND  lname='$v_lname')) AND memberid='$id'");

                if(mysqli_num_rows($sql)>0)
                {
                        $error="contact exist!";

                }
                else
                {

                              $sql="INSERT INTO contact(fname,lname,phone,altphone,email,memberid) VALUES ($v_fname','$v_lname','$v_phone','$v_altphone','$v_email','$id')";

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
                            <p>
                            <div id="altphone"><input style=" margin-left:15px;" type="tel" name="altphone" id="altphone1" placeholder="Enter Alternate Mobilenumber!" minlength='10' maxlength='10'><input type="button" id="addaltphone" onClick="addaltphone()" value="+" /> 
                            </div>
                            </p>
                            <p>
                                <input type="email" name="email" id="email" placeholder="Enter Emailid!" required/>
                            </p>
                            <p>
                                <div id="filediv">
                                <input id="file" type="file" name="image" value="<?php if(isset($_POST['image'])) echo $_POST['image']; ?>" required />
                                <!--<input type="submit" name="Submit" value="Upload"  />-->
                                </div>
                            </p>
                            <p>
                            <input type="submit" name="submit" value="Submit" />
                            </p>
                            <br>
                            <br>
                            <span><?php echo $error; ?></span>
                    </div>
                    </form>
            </center>
        </div>
    </body>
    </html>