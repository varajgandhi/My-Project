<?php
session_start();
if(isset($_POST['submit']))
{
        //not empty
        $errors = array();
        //start validation
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword']; 
        $imagename=$_FILES["image"]["name"];

        $folder="memberimages/";

        move_uploaded_file($_FILES["image"]["tmp_name"], "$folder".$_FILES["image"]["name"]);

        if($password!=$confirmpassword)
        {
            $errors['confirmpassword1']="Password Mismatched!";
        }        
        if(count($errors) == 0)
        {
                $image=$imagename;
                $firstname=$_POST['firstname'];
                $lastname=$_POST['lastname'];
                $emailid=$_POST['emailid'];
                $phone=$_POST['phone'];
                $gender=$_POST['gender'];
                $dob=$_POST['dob'];     
                $username=$_POST['username'];
                $password=$_POST['password'];
                $conn=new mysqli("localhost", "root", "","phonebook");

                $sql = mysqli_query($conn,  "SELECT firstname,lastname,emailid,username FROM members WHERE (firstname='$firstname' AND lastname='$lastname') AND   emailid='$emailid' AND username = '$username'");                     
                if(mysqli_num_rows($sql)>0)
                { 
                    $error="Member Exist" ;
                }
                else
                {
                     $sql="INSERT INTO members(image,firstname,lastname,emailid,phone,gender,dob,username,password ) VALUES ('$image','$firstname','$lastname','$emailid','$phone','$gender','$dob','$username','$password')";
                    if($conn->query($sql) == TRUE)
                    {
                        header('location:indexpb.php');
                    } 
                    else 
                    {
                        echo "error: " . $sql . "<br>" . $conn->error;
                    }
                }
                $conn->close();
        }
}

?>

    <html>
    <head>
    <script>
    function myFunction()
    {
        alert("Registeration Successful!");
    }
    </script>
    </head>
    </head>
    <link rel="stylesheet" href="my_layout.css" type="text/css" />
    <title>Phone Book Project</title>

    <body class="my_body">
        <div id="my_divition" class="aa"><!-- -->
            <center>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post"  onsubmit="myFunction()" >
                    <h1 style="color:#33c3b6;">Registration form </h1>
                    <table>
                        <tr>
                            <td>
                                <label>First Name:</label>
                            </td>
                            <td>
                                <input type="text" name="firstname" id="firstname" placeholder=" Enter Your Firstname!" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>" minlength="2" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Last Name:</label>
                            </td>
                            <td>
                                <input type="text" name="lastname" id="lastname" placeholder=" Enter Your Lastname!" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>" minlength="2" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email-ID:</label>
                            </td>
                            <td>
                                <input type="email" name="emailid" id="emailid" placeholder=" Enter Your Email Address!" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>MobileNumber</label>
                            </td>
                            <td>
                                <input type="tel" name="phone" id="phone" placeholder="Mobilenumber!" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" minlength="10" maxlength="10" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Gender:</label>
                            </td>
                            <td>
                                <input type="radio" name="gender" id="gender" value="male" />
                                <label>Male</label>
                                <input type="radio" name="gender" id="gender" value="female" />
                                <label>FeMale</label>
                                <input type="radio" name="gender" id="gender" value="transgender" />
                                <label>TransGender</label>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>DOB:</label>
                            </td>
                            <td>
                                <input type="date" name="dob" id="dob" value="<?php if(isset($_POST['dob'])) echo $_POST['dob']; ?>" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>UserName:</label>
                            </td>
                            <td>
                                <input type="text" name="username" id="username" placeholder="Username!" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" minlength="6" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password:</label>
                            </td>
                            <td>
                                <input type="password" name="password" id="password" placeholder="Password!" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" minlength="6" required />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Confirm Password:</label>
                            </td>
                            <td>
                                <input type="password" name="confirmpassword" id="cofirmpassword" placeholder="Cofirm Password!" value="<?php if(isset($_POST['confirmpassword']))   echo $_POST['password']; ?>" minlength="6" required />
                            </td>
                        </tr>
                        <tr>
                                <td>
                                    <label>Profile Image:</label>
                                </td>
                                <td>
                                <div id="filediv">
                                <input id="file" type="file" name="image" value="<?php if(isset($_POST['image'])) echo $_POST['image']; ?>" required />
                                <!--<input type="submit" name="Submit" value="Upload"  />-->
                                </div>
                                </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Register" /> 
                                <input type="reset" name="reset" value="Reset" />
                            </td>
                        </tr>
                    </table>
                    <p>
                        <?php if(isset($errors['confirmpassword1'])) echo $errors['confirmpassword1']; ?>
                    </p>
                </form>
            </center>
        </div>
    </body>
    </html>
    <!--&nbsp&nbsp&nbsp<input type="button" value="Home" onclick="window.location.href='indexpb.php'" />-->