<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
    <title>Insert Image</title>
</head>
<body>
<form action="afteraddimage.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button>Upload</button>
</form>
</body>
</html>