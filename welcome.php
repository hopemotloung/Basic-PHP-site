<?php
session_start();
$name = "root";
$pass = "123456789";
$server = "localhost";
$port = 3306;
$dbname = "sxul";

$conn = mysqli_connect( $server,  $name , $pass, $dbname);
$email = $_SESSION["username"];

$stmt = $conn->prepare("SELECT name, surname, email, profession, parent_id, cell_no, birthday, gender, password FROM  parents WHERE email = ?
UNION SELECT name, surname, email, teachers_id, cell_no, birthday, gender, race, password FROM teacher WHERE email = ?
UNION SELECT name, surname, email, student_course, student_id, cell_no, birthday, gender, password FROM student WHERE email = ?");
$stmt->bind_param("sss",$email, $email, $email);
$stmt->execute();

$results = $stmt->get_result();
$row = $results->fetch_assoc();
if($results->num_rows > 0){
    echo "found";
   
}

$stmt->close();

//to log out
if(isset($_POST['logout'])){
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>welcome</title>
</head>
<body>
    <h1>Good to see you back <?php echo $row["name"]?></h1>
        <div class="info">
            <h3>Account details</h3>
            <ul>
                <li>Name:<?php echo $row["name"]?></li>
                <li>Surname: <?php echo $row["surname"]?></li>
                <li>Email: <?php echo $row["email"]?></li>
            </ul>
        </div>

        <form action="welcome.php" method="post">
            <input type="Submit" name="logout" value="Log Out">
        </form>


    <script src="java.js"></script>
</body>
</html>