<?php
session_start();


$name = "root";
$pass = "123456789";
$server = "localhost";
$port = 3306;
$dbname = "sxul";

$conn = mysqli_connect( $server,  $name , $pass, $dbname);

if($conn)
{
  echo "db connection successful";
}
else{
    echo "db connection not successful";
    die();
}


$un = $_POST['username'];
$pw = $_POST['password'];

// Use prepared statements to prevent SQL injection
$tsql = "SELECT email, password FROM teacher WHERE email = ? AND password = ? 
UNION SELECT email, password FROM student WHERE email = ? AND password = ? 
UNION SELECT email, password FROM parents WHERE email = ? AND password = ?";
$stmt = mysqli_prepare($conn, $tsql);
mysqli_stmt_bind_param($stmt, "ssssss", $un, $pw, $un, $pw, $un, $pw);
mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // Valid credentials
    session_start();
    $_SESSION["username"] = $un;
    header("Location: welcome.php");
    exit;
} else {
    // Invalid credentials
    echo "Invalid username or password. Please try again.";
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);



 ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>welcome to Login page</h1>
    <div class="log">
        <form action="login.php" method="post">
            <label for="">email:</label><br>
            <input type="text" placeholder="John" name="username" required id=""><br><br>
           
            <label for="">password:</label><br>
            <input type="password" name="password" placeholder="*********" required id=""><br><br>
            <input type="checkbox" name="" id="">Remember password <br> <br>
            
            <button type="submit"><b>LOGIN</b></button>
            <br> 
            <p>Don't have an account? <br>Register <a href="reg.php">Here</a></p>
        </form>
    </div>
</body>
</html>