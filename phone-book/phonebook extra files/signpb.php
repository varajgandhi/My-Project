<?php
$form_view=true;
if(isset($_POST['submit']))
    {
        //not empty
        //atleast 6 characters long

        $errors = array();

        //start validation
        if(empty($_POST['username']))
        {
            $errors['username1'] = "Your username cannot be empty";
        }
        else if(strlen($_POST['username']) < 2)
        {
            $errors['username2'] = "Your username must be atleast 2 characters long";
        }

        if(empty($_POST['password']))
        {
            $errors['password1'] = "Password cannot be empty";
        }
        else if(strlen($_POST['password']) < 8)
        {
            $errors['password2'] = "Password must be atlest 8 characters long";
        } 
        if(count($errors) == 0)
        {
            
            //redirect to success pages
           
            //redirect to success pages
            $conn= new mysqli("localhost","root","","phonebook");

            if($conn->connect_error)
            {
                die("connection failed:".$connect->connect_error);
            }

         //Get data in local variable

            $username=$_POST['username'];

            $password=$_POST['password'];

            $sql = mysqli_query($conn,  "SELECT username FROM members WHERE username = '$username'");
 
            if(mysqli_num_rows($sql)>0)
           // if(!$rows)
            {
                    $form_view=false;
                    include("signpb.php");
                    echo"Member exists";
            }
            else
            {

                $sql="INSERT INTO members(username,password ) VALUES ('$username','$password')";

                if($conn->query($sql) === TRUE)
                {
                    $form_view=false;
                    echo "Signup Successful!";
                    header("Location:http:indexpb1.php");
                } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

             $conn->close();

         
        }

}

if($form_view) {

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
        <style type="text/css">
         body{
            background-color:#E0EEEE;
        }
       
        .aa
        {
            width:450px;
            height:380px;
            background-color:#00C5CD;
            margin:0 auto;
            border-radius:10px;
            border:10px solid #ccc;
            margin-top:100px;
            padding-top:5px;
            padding-left:20px;
            border-radius:15px;  
            -webkit-border-radius:15px; 
            -o-border-radius:15px;
            -moz-border-radius:15px;
            color:white;
            font-weight:bolder; 
           /* box-shadow: inset -6px -6px rgba(0,0,0,0.5); */

        }

            .aa input[type="text"]
        {
            width:200px;
            height:35px;
            padding-left:50px;
            border:0;
            border-radius:5px;
            border:3px solid #ccc;
            border-radius:5px;
            -webkit-border-radius:5px;
            -o-border-radius:5px;
            -moz-border-radius:5px;
        }
          .aa input[type="password"]
        {
            width:200px;
            height:35px;
            padding-left:50px;
            border:0;
            border-radius:5px;
            border:3px solid #ccc;
            border-radius:5px;
            -webkit-border-radius:5px;
            -o-border-radius:5px;
            -moz-border-radius:5px;
        }
         .aa input[type="submit"]
        {
            width:260px;
            height:35px;
            border:0;
            /*border-radius:5px;*/
            -webkit-border-radius:5px;
            -o-border-radius:5px;
            -moz-border-radius:10px;
            background-color: #009;
            color: #fff;
            border: 2px solid #06F;
            font-weight:bolder;

        }  


        </style>
    </head>
    <body>
    <div class="aa"> 
    <h2 style="color:#000000" align="center";>SIGNIN</h2>
   <center><form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">         
            <p>   
                 
            <input type="text" name="username" id="username" placeholder="Enter Your username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"/></br></br>
            </p>
            <p><?php if(isset($errors['username1'])) echo $errors['username1']; ?></p>
            <p><?php if(isset($errors['username2'])) echo $errors['username2']; ?></p>
           
            <input type="password" name="password"  placeholder="Enter Password" id="password" /></br>
            </p>
            
            <p><?php if(isset($errors['password1'])) echo $errors['password1']; ?></p>
            <p><?php if(isset($errors['password2'])) echo $errors['password2']; ?></p>

            <input type="submit" value="Submit" name="submit" />

          

            <p><a href="signpb.php">Signup</a> | <a href="indexpb.php">Login</a></p>

        </div>

            
        </form></center>
     
    </body>
</html>
<?php 
 }

?>