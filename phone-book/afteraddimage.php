<!DOCTYPE html>
<html>
<head>
    <title>Insert Image</title>
</head>
<body>
<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    $con = mysqli_connect('localhost','root','','mysqldb') or die('Unable To connect');
    $sql = "insert into images (image) values(?)";
 
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
    }
    mysqli_close($con);
}
?>
<?php
    echo $msg;
?>
</body>
</html>