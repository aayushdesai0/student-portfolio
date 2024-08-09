<?php
@session_start();

require_once "dbcon.php";

if(isset($_POST['registerBtn']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $department = mysqli_real_escape_string($conn,$_POST['department']); 
    $semester = mysqli_real_escape_string($conn,$_POST['semester']); 

    $errors = [];

    if($name == '' OR $phone == '' OR $email == '' OR $password == '' OR $department == '' OR $semester == ''){
        array_push($errors, "All fields are required");
    }

    if($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Enter valid email address");
    }

    if($email != ''){
        $adminCheck = mysqli_query($conn, "SELECT email FROM admin WHERE email='$email'");
        if($adminCheck){
            if(mysqli_num_rows($adminCheck) > 0){
                array_push($errors, "Email already registered");
            }
        }else{
            array_push($errors, "Something Went Wrong!");
        }
    }

    if(count($errors) > 0){
        $_SESSION['errors'] = $errors;
        header('Location: register.php');
        exit();
    }

    $query = "INSERT INTO admin (name,phone,email,password,department,semester) VALUES ('$name','$phone','$email','$password','$department','$semester')"; // Updated query to include department and semester
    $userResult = mysqli_query($conn, $query);

    if($adminResult){
        $_SESSION['message'] = "Registered Successfully";
        header('Location: index.php');
        exit();
    }else{
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: register.php');
        exit();
    }

}

?>
