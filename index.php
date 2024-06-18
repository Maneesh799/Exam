<?php
session_start();
echo "Welcome ".$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files</title>
</head>
<body>

    <?php include('connection.php'); ?>
    <?php 
    $x = 5985;
    function add(){
        $z = $GLOBALS['x'] + $GLOBALS['x'];
        echo $z;
    }
    add();

    if(!$_SESSION['username']){
        header("location:login.php");
    }
    ?>
    <form enctype="multipart/form-data" method="post">
        <label for="title">Enter text</label>
        <input type="text" name='title'>
        <label for="myfile">Upload File</label>
        <input type="file" name="myfile">
        <input type="submit" name="submit">
    </form>
  
    <form  method="post">
        <input type="submit" value="logout" name="logout">
    </form>
    <?php

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $file = $_FILES['myfile'];
        $filename = rand(1000, 1000) . '-' . $file['name'];

        $tempname = $file['tmp_name'];
        move_uploaded_file($tempname, 'uploads/' . $filename);

        $query = "INSERT INTO `demo` (title, file_name) VALUES ('$title', '$filename')";
        if (mysqli_query($connection, $query)) {
            echo "File uploaded successfully";
        } else {
            // die("Query failed: " . mysqli_error($connection));
        }
    }
    if(isset($_POST['logout'])){
        header("location:logout.php");
    }
    ?>
</body>
</html>
