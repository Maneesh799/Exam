<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter username ">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter password">
        <input type="submit" value="Login" name="login">
    </form>
</body>
</html>
<?php
 include('connection.php');
?>
<?php
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
    // Use single quotes around the variables
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($connection,$query);
    if($result){
        $row = mysqli_num_rows($result);
        if($row != 0){
            $_SESSION['username']=$username;
            header("location:index.php");
        }
        else{
            echo "Login failed";
        }
  }
  else{
    die("Query failed ");
  }

}
?>