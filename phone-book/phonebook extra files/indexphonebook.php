<?php
$form_view=true;
if(isset($_POST['submit']))
    {
        //not empty
        //atleast 6 characters long

        $errors = array();


        //start validation
        if(empty($_POST['firstname']))
        {
            $errors['firstname1'] = "Your name cannot be empty";
        }
        else if(strlen($_POST['name']) < 2)
        {
            $errors['firstname2'] = "Your  name must be atleast 2 characters long";
        }

        if(empty($_POST['lastname']))
        {
            $errors['lastname1'] = "Your mobilenumber1 cannot be empty";
        }
        else if(strlen($_POST['lastname']) >2)
        {
            $errors['lastname2'] = "lastname must be atleast 2 characters long";
        }

        if(empty($_POST['email']))
        {
            $errors['email1'] = "Email cannot be empty";
        }
        else if(strlen($_POST['email']) < 6)
        {
            $errors['email2'] = "Email must be atleast 6 characters long";
        }
        else {
                 $email = test_input($_POST["email"]); 
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    $errors['email3'] = "Invalid email format"; 
                }
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

            $v_firstname=$_POST['fname'];

            $v_lname=$_POST['lname'];

            $v_email=$_POST['email'];

            $v_password =$_POST['password'];

            $sql = mysqli_query($conn,  "SELECT email FROM membernew WHERE email = '$v_email'");
 
            if(mysqli_num_rows($sql)>0)
           // if(!$rows)
            {
                    $form_view=false;
                    echo"User exists";
            }
            else
            {

                $sql="INSERT INTO membernew(firstname,lastname,email,password ) VALUES ('$v_fname','$v_lname','$v_email','$v_password')";

                if($conn->query($sql) === TRUE)
                {
                    $form_view=false;
                    echo "Signup Successful!";
                    header("Location:http:loginphonebook.php");
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
            width:550px;
            height:580px;
            background-color:#00C5CD;
            margin:0 auto;
            border-radius:10px;
            border:10px solid #ccc;
            margin-top:5px;
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
    <h2 style="color:#000000" align="center";>SIGNIN FORM</h2>
   <center><form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">         
            <p>   
                 
            <input type="text" name="firstname" id="firstname" placeholder="Enter Your Firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>"/></br></br>
            </p>
            <p><?php if(isset($errors['firstname1'])) echo $errors['firstname1']; ?></p>
            <p><?php if(isset($errors['firstname2'])) echo $errors['firstname2']; ?></p>
           
            <p>
            <input type="text" name="lastname" id="lastname" placeholder="Enter Your Lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>" /></br></br>
            </p>
            
            <p><?php if(isset($errors['lastname1'])) echo $errors['lastname1']; ?></p>
            <p><?php if(isset($errors['lastname2'])) echo $errors['lastname2']; ?></p>

            <p>
            <input type="text" name="email" id="email" placeholder="Enter Your EmailID" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></br></br>
            </p>
            
            <p><?php if(isset($errors['email1'])) echo $errors['email1']; ?></p>
            <p><?php if(isset($errors['email2'])) echo $errors['email2']; ?></p>
            <p><?php if(isset($errors['email3'])) echo $errors['email3']; ?></p>

            <p>
            <input type="password" name="password"  placeholder="Enter Password" id="password" /></br>
            </p>
            
            <p><?php if(isset($errors['password1'])) echo $errors['password1']; ?></p>
            <p><?php if(isset($errors['password2'])) echo $errors['password2']; ?></p>

            <input type="submit" value="Submit" name="submit" />

          

            <p><a href="indexphonebook.php">Signup</a> | <a href="loginphonebook.php">Login</a></p>

        </div>

            
        </form></center>
     
    </body>
</html>
<?php 
 }

 function test_input($data) 
             {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
?>