<?php 
@session_start();

require_once 'dbcon.php';
if(isset($_POST))
{
    $isEmpty = false;
    for ($i=0; $i < count($_POST['description']); $i++) { 
        if(!isset($_FILES['certificate']['tmp_name'][$i]) OR $_POST['description'][$i] == ''){
            $isEmpty = true;
        }
    }
    
    if($isEmpty)
    {
        $_SESSION['errors'] = array('*All fields are mandetory');
        header('Location: dashboard.php');
        exit();
    }
    $UploadCount=0;
    for ($i=0; $i < count($_POST['description']); $i++) { 
        $uploaddir = 'uploads/certificate/';
        $uploadfile = $uploaddir . basename($_FILES['certificate']['name'][$i]);

        $UserID = mysqli_real_escape_string($conn,$_SESSION['UserID']);
        $UploadURL = mysqli_real_escape_string($conn,basename($_FILES['certificate']['name'][$i]));
        $Description = mysqli_real_escape_string($conn,$_POST['description'][$i]); 
        $UploadOn = mysqli_real_escape_string($conn,date('Y-m-d H:i:s')); 

        if (move_uploaded_file($_FILES['certificate']['tmp_name'][$i], $uploadfile)) {
            $query = "INSERT INTO tbl_certificate (UserID,UploadURL,Description,UploadOn) VALUES ('$UserID','$UploadURL','$Description','$UploadOn')";
            $userResult = mysqli_query($conn, $query);
            if($userResult == 1){
                $UploadCount++;
            }
        } else {
            echo "Possible file upload attack!\n";
        }
    }
    if($UploadCount == count($_POST['description'])){
        $_SESSION['message'] = "Certificate Upload Successfully.";
        header('Location: dashboard.php');
        exit();
    }else{
        $_SESSION['message'] = "Something Went Wrong.";
        header('Location: dashboard.php');
        exit();
    }
}
?>