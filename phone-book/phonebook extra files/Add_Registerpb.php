<?php
if(isset($_POST['submit']))
{
        //not empty
        $errors = array();
        //start validation
        if(empty($_POST['username']))
        {
            $errors['username1'] = "Username cannot be empty";
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
                    include('Registerpb.php');  
                    echo "<html><body><br />Member exists!<br /></body></html>" ;
                }
                else
                {
                    $sql="INSERT INTO members(username,password ) VALUES ('$username','$password')" ;
                    if($conn->query($sql) == TRUE)
                    {
                        include('indexpb1.php');
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
 
