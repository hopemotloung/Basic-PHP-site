<?php
$server = "localhost";
$admin = "root";
$pass = "123456789";
$port = 3306;
$dbname = "sxul";

$conn = mysqli_connect($server, $admin, $pass, $dbname);

if($conn){
    echo "connected to db";
}else{
    echo "db connection error";
}

//end of database connection
$p_name = mysqli_real_escape_string($conn, $_POST['parent_name']);
$p_surname = mysqli_real_escape_string($conn, $_POST['parent_surname']);
$p_email = mysqli_real_escape_string($conn, $_POST['parent_email']);
$p_profession = mysqli_real_escape_string($conn, $_POST['parent_profession']);
$p_id = mysqli_real_escape_string($conn, $_POST['parent_id']);
$p_no = mysqli_real_escape_string($conn, $_POST['parent_number']);
$p_birthday = mysqli_real_escape_string($conn, $_POST['parent_birthday']);
$p_name = mysqli_real_escape_string($conn, $_POST['parent_name']);
$p_male = mysqli_real_escape_string($conn, $_POST['parent_male']);
$p_password = mysqli_real_escape_string($conn, $_POST['parent_password']);

$t_name = mysqli_real_escape_string($conn, $_POST['teacher_name']);
$t_surname = mysqli_real_escape_string($conn, $_POST['teacher_surname']);
$t_email = mysqli_real_escape_string($conn, $_POST['teacher_email']);
$t_id = mysqli_real_escape_string($conn, $_POST['teacher_id']);
$t_no = mysqli_real_escape_string($conn, $_POST['teacher_number']);
$t_birthday = mysqli_real_escape_string($conn, $_POST['teacher_birthday']);
$t_race = mysqli_real_escape_string($conn, $_POST['teacher_race']);
$t_name = mysqli_real_escape_string($conn, $_POST['teacher_name']);
$t_male = mysqli_real_escape_string($conn, $_POST['teacher_male']);
$t_password = mysqli_real_escape_string($conn, $_POST['teacher_password']);

$s_name = mysqli_real_escape_string($conn, $_POST['student_name']);
$s_surname = mysqli_real_escape_string($conn, $_POST['student_surname']);
$s_email = mysqli_real_escape_string($conn, $_POST['student_email']);
$s_course = mysqli_real_escape_string($conn, $_POST['student_course']);
$s_id = mysqli_real_escape_string($conn, $_POST['student_id']);
$s_no = mysqli_real_escape_string($conn, $_POST['student_number']);
$s_birthday = mysqli_real_escape_string($conn, $_POST['student_birthday']);
$s_name = mysqli_real_escape_string($conn, $_POST['student_name']);
$s_male = mysqli_real_escape_string($conn, $_POST['student_male']);
$s_password = mysqli_real_escape_string($conn, $_POST['student_password']);

//queries
$squery = "INSERT INTO student (name, surname, email, student_course, student_id, cell_no, birthday, gender, password)
 VALUES ('$s_name', '$s_surname', '$s_email', '$s_course', '$s_id', '$s_no','$s_birthday', '$s_male', '$s_password')";
$tquery = "INSERT INTO teacher (name, surname, email, teachers_id, cell_no, race, birthday, gender, password)
VALUES ('$t_name', '$t_surname', '$t_email', '$t_id', '$t_no', '$t_race','$t_birthday', '$t_male', '$t_password')";
$pquery = "INSERT INTO parents (name, surname, email, profession, parent_id, cell_no, birthday, gender, password)
VALUES ('$p_name', '$p_surname', '$p_email', '$p_profession', '$p_id', '$p_no','$p_birthday', '$p_male', '$p_password')";

//check query
if (mysqli_query($conn, $squery)) {
    echo "User inserted successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

if (mysqli_query($conn, $pquery)) {
    echo "User inserted successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

if (mysqli_query($conn, $tquery)) {
    echo "User inserted successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <script src="https://kit.fontawesome.com/dc9fd3edda.js" crossorigin="anonymous"></script>
    <title>Registration</title>
</head>
<body>
    <h1>Welcome to registration page</h1>

    <div class="main1">
            <h3><a class="y" id="stu" href="#">Student</a></h3>
            <h3><a class="y" id="par" href="#">Parent</a></h3>
            <h3><a class="y" id="tea" href="#"><i class="fa-solid fa-chalkboard-user"></i>&nbspTeacher</a></h3>
    </div>
    <hr>
<!-- student -->
    <div class="student whole">
    <form  action="reg.php" method="post">
        <input type="text" name="student_name" placeholder="Name" id=""> <br> <br>
        <input type="text" name="student_surname" placeholder="Surname" id=""> <br> <br>
        <input type="email" name="student_email" placeholder="Email" id=""> <br> <br> 
        <input type="text" name="student_course" placeholder="Student Course" id=""> <br><br>
        <input type="number" name="student_id" placeholder="Student Id" id=""> <br><br>
        <input type="number" name="student_number" placeholder="Cell No." id=""> <br> <br>
        <label for="birthday">Birthday:</label>
        <input type="date" name="student_birthday" placeholder="Birthday" id=""> <br><br>
        <input type="checkbox" name="student_male" id=""><label for="male">Male</label><input type="checkbox" name="student_female" id=""><label for="female">Female</label><br><br>
        <input type="password" name="student_password" placeholder="Password" id=""> <br> <br>
        <input class="buttons" type="submit" value="Create An Account"><input class="buttons" type="reset" value="Clear">
    </form>
    <hr>
    </div>

<!-- Teacher -->
    <div class="teacher whole">
    <form  action="reg.php" method="post">
        <input type="text" name="teacher_name" placeholder="Name" id=""> <br> <br>
        <input type="text" name="teacher_surname" placeholder="Surname" id=""> <br> <br>
        <input type="email" name="teacher_email" placeholder="Email" id=""> <br> <br> 
        <!-- <input type="text" name="course" placeholder="Teachers speciality" id=""> <br><br> -->
        <input type="number" name="teacher_id" placeholder="Teachers Id" id=""> <br><br>
        <input type="number" name="teacher_number" placeholder="Cell No." id=""> <br> <br>
        <input type="text" name="teacher_race" placeholder="Race" id=""> <br> <br>
        <label for="birthday">Birthday:</label>
        <input type="date" name="teacher_birthday" placeholder="Birthday" id=""> <br><br>
        <input type="checkbox" name="teacher_male" id=""><label for="male">Male</label><input type="checkbox" name="teacher_female" id=""><label for="female">Female</label><br><br>
        <input type="password" name="teacher_password" placeholder="Password" id=""> <br> <br>
        <input class="buttons" type="submit" value="Create An Account"><input class="buttons" type="reset" value="Clear">
    </form>
    <hr>
    </div>

<!-- Parent -->
    <div class="parent whole">
    <form  action="reg.php" method="post">
        <input type="text" name="parent_name" placeholder="Name" id=""> <br> <br>
        <input type="text" name="parent_surname" placeholder="Surname" id=""> <br> <br>
        <input type="email" name="parent_email" placeholder="Email" id=""> <br> <br> 
        <input type="text" name="parent_profession" placeholder="Profession" id=""> <br><br>
        <input type="number" name="parent_id" placeholder="Parent Id" id=""> <br><br>
        <input type="number" name="parent_number" placeholder="Cell No." id=""> <br> <br>
        <label for="birthday">Birthday:</label>
        <input type="date" name="parent_birthday" placeholder="Birthday" id=""> <br><br>
        <input type="checkbox" name="parent_male" id=""><label for="male">Male</label><input type="checkbox" name="parent_female" id=""><label for="female">Female</label><br><br>
        <input type="password" name="parent_password" placeholder="Password" id=""> <br> <br>
        <input class="buttons" type="submit" value="Create An Account"><input class="buttons" type="reset" value="Clear">
    </form>
    <hr>
    </div>

    <script src="java.js"></script>
</body>
</html>