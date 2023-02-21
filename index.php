<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="login-box">
      <h1>LOGIN</h1>
      <h3>Satya | Mikael | Malik | William</h3>
      <form action="index.php" method="post">
        <div class="user-box">
          <input type="text" name="username" placeholder="Username" />
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" placeholder="Password" />
          <label>Password</label>
        </div>
        <a href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <input type="submit" value="Submit">
        </a>
      </form>
    </div>
  </body>
</html>

<?php
//Connect database to form
$databaseName = "db_user";
$con = mysqli_connect("localhost","root",'', $databaseName);
if(!$con){
    echo "ERROR: Failed to connect";
}
if(isset($_POST['username']) && isset($_POST['password'])){ //dicek biar inputnya ga null
    $username = $_POST['username'];
    $password = $_POST['password'];

  //Validate input
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = htmlspecialchars($username);  
    $password = htmlspecialchars($password); 
    $username = trim($username);  
    $password = trim($password); 
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  

    $tableName = "logincreds";
    $query = "SELECT * FROM $tableName where username = '$username' and password = '$password'";
    $result = mysqli_query($con, $query);  
    if(mysqli_num_rows($result)==1){
        echo "<h1><center> Login successful </center></h1>"; 
    }else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }    
}
?>