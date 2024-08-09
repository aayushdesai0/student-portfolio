<?php
@session_start();

require_once "dbcon.php";

if(isset($_POST['registerBtn']))
{
    $id = $_SESSION['UserID'];
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $department = mysqli_real_escape_string($conn,$_POST['department']); 
    $semester = mysqli_real_escape_string($conn,$_POST['semester']); 

    $errors = [];

    if($name == '' OR $phone == '' OR $email == '' OR $password == '' OR $department == '' OR $semester == ''){
        array_push($errors, "*All fields are required");
    }

    if($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "*Enter valid email address");
    }

    if($email != ''){
        $userCheck = mysqli_query($conn, "SELECT email FROM users WHERE email='$email' AND id!='$id'");
        if($userCheck){
            if(mysqli_num_rows($userCheck) > 0){
                array_push($errors, "Email already registered");
            }
        }else{
            array_push($errors, "Something Went Wrong!");
        }
    }

    if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        header('Location: profile.php');
        exit();
    }

    $query = "UPDATE users set name='$name',phone='$phone',email='$email',password='$password',department='$department',semester='$semester' where id='$id'"; // Updated query to include department and semester
    $userResult = mysqli_query($conn, $query);

    if($userResult){
        $_SESSION['message'] = "Profile change Successfully";
        $_SESSION['name'] = $name;
        header('Location: profile.php');
        exit();
    }else{
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: profile.php');
        exit();
    }

}

?>
