<?php
session_start();
$error='';
//$msg = '';    
if(isset($_SESSION['memberid']))
{ 
if(isset($_POST['submit']))
{
  
                $imagename=$_FILES["image"]["name"]; 

                $folder="images/";

                move_uploaded_file($_FILES["image"]["tmp_name"], "$folder".$_FILES["image"]["name"]);

                $v_fname=$_POST['firstname'];
                $v_lname=$_POST['lastname'];
                $v_phone=$_POST['phone'];
                //$v_altphone=$_POST['altphone_1'];
                $v_altphone="";
                $more=TRUE;
                $i=0;
                foreach ($_POST['altphone'] as $key => $value) {
                   if($key==0) {
                     $columns='altphone';
                     $column_values=$value;
                   }
                   else {
                    $columns.=',altphone'.$key;
                    $column_values.=','.$value;
                   }
                }
                $columns." ".$column_values;
                $v_email=$_POST['email'];
                $id=$_SESSION['memberid'];
                //Restriction to the image. You can upload any types of file for example video file, mp3 file, .doc or .pdf just mention here in OR condition   
                //Database connection establishment
                $conn=new mysqli("localhost", "root", "","phonebook");
                //Insert contacts into database and comparison opration
               $sql = mysqli_query($conn,  "SELECT * FROM contact WHERE (email='$v_email' OR phone = '$v_phone' OR (fname= '$v_fname' AND  lname='$v_lname')) AND memberid='$id'"); 
                if(mysqli_num_rows($sql)>0)
                {
                        $error="<span style='color:orange;'>contact exist!</span>";

                }
                else
                {
                        $sql="INSERT INTO contact(image,fname,lname,phone,".$columns.",email,memberid)VALUES('$imagename','$v_fname','$v_lname','$v_phone',
                        ".$column_values.",'$v_email','$id')";
                        $result=mysqli_query($conn,$sql); 
                        $error="<span style='color:lightgreen;'>The contact added successfully!</span>";
                }

    }
}
?>
    <html>
    <link rel="stylesheet" href="my_layout.css" type="text/css" />
    <title>Phone Book Project</title>
    <head>
     <style>
    .button{
        height:3px;
        width:3px;
    }
    #altphone input[type="button"]
    {
        height:30px;
        width:30px;
        margin-left:15px;
        cursor:pointer;
    }
    input[type="button"]
{
    height:30px;
    width:auto;
    cursor:pointer;
    color:white;
    background-color:goldenrod;
    border:0;
    border-radius:5px;
    border:3px solid  #058d9e;
    border-radius:5px;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    -moz-border-radius:5px;
    font-weight:bold;
}
    </style>
    <script type="text/javascript">
    var i=1;
    function addaltmobile()
    {
        if(i<=3)
        {
            i++;
            var div=document.createElement('div');
            div.innerHTML='<input style="margin-left:85px; margin-top:15px;" type="tel" name="altphone[]" minlength="10" maxlength="10" placeholder="Enter Alt MobileNumber'+i+'" /><input type="button" id="addaltphone"  onclick="addaltmobile()" value="+"/><input type="button" value="-"  onclick="removealtphone(this)"/>'; 
            document.getElementById('altphone').appendChild(div);
        }
        else
        {
            alert("Limit Exceeded");
        }

    } 
    function removealtphone(div)
    {
            document.getElementById('altphone').removeChild(div.parentNode);
            i--;
    } 
    </script>
    </head>
    <body class="my_body">
        <div id="my_divition">
            <center>
                <?php include('home1.php'); ?>
                    <div class="aa">
                        <br><b style="color:#33c3b6;">Enter Contact Details</b>
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
                            <div id="altphone">
                                <input style="margin-left:40px;" type="tel" name="altphone[]" id="altphone" placeholder="Enter Alt Mobilenumber!" minlength='10' maxlength='10' required><input type="button"  id="addaltphone"  onclick="addaltmobile()" value="+" />
                            </div>
                            </p>
                            <p>
                                <input type="email" name="email" id="email" placeholder="Enter Emailid!" required/>
                            </p>
                            <p>
                                <div id="filediv">
                                <input style='border:2px solid #058d9e; border-radius:5px; cursor:pointer; ' id="file" type="file" name="image" value="<?php if(isset($_POST['image'])) echo $_POST['image']; ?>" required />
                                </div>
                            </p>
                            <p>
                            <input style='background-color:#4caf50; color:white; border-color:#0d6b11; width:120px; height:35px; font-weight:bold; ' type="submit" name="submit" value="Submit" />
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