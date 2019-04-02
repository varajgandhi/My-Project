<?php
$error='';
if(isset($_POST['submit']))
{
        //not empty
        $errors = array();
        //start validation
        if(empty($_POST['username']))
        {
            $errors['username1'] = "Username cannot be empty";
            //header("location:Registerpb.php?u=error");
        }
        else if(strlen($_POST['username']) < 2)
        {
            $errors['username2'] = "Username must be atleast 2 characters long";
        }

        if(empty($_POST['password']))
        {
            $errors['password1'] = "Password cannot be empty";
        }
        else if(strlen($_POST['password']) < 8)
        {
            $errors['password2'] = "Password must be atleast 8 characters long";
        }
        if(count($errors) == 0)
        {
                $conn=new mysqli("localhost", "root", "","phonebook");    
                $username=$_POST['username'];
                $password=$_POST['password'];

                $sql = mysqli_query($conn,  "SELECT username FROM members WHERE username = '$username'");                     
                if(mysqli_num_rows($sql)>0)
                { 
                    $error="Member Exist" ;
                }
                else
                {
                    $sql="INSERT INTO members(username,password ) VALUES ('$username','$password')" ;
                    if($conn->query($sql) == TRUE)
                    {
                        header('location:indexpb1.php');
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
<link rel="stylesheet" href="my_layout.css"  type="text/css" />
<title>Phone Book Project</title>
<body class="my_body">
<div id="my_divition" class="aa">  
            <center>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
                    <h1>Register form </h1><br />
                    <p>
                    <input type="text" name="username" id="username" placeholder="Provide Username!" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" /><br />
                    </p>
                    <p><?php if(isset($errors['username1'])) echo $errors['username1']; ?></p>
                    <p><?php if(isset($errors['username2'])) echo $errors['username2']; ?></p>
                    <p>
                    <input type="text" name="password" id="password" placeholder="Provide Password!" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" /><br />
                    </p>
                    <p><?php if(isset($errors['password1'])) echo $errors['password1']; ?></p>
                    <p><?php if(isset($errors['password2'])) echo $errors['password2']; ?></p>
                    <input type="submit" name="submit" value="Submit"  /> | <input type="button" value="Login" onclick="window.location.href='indexpb.php'" /><br><br>
                    <span><?php echo $error; ?></span>  


            </form>  
            </center>
</div> 
</body>
</html>