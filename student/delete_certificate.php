<?php 
@session_start();

require_once 'dbcon.php';
if(isset($_GET['id']))
{
    $CertificateID = $_GET['id'];
    $cerQuery = "SELECT * FROM tbl_certificate WHERE CertificateID ='$CertificateID'";
    $cerresult = mysqli_query($conn, $cerQuery);
    $cerdata = mysqli_fetch_assoc($cerresult);
    unlink('uploads/certificate/'.$cerdata['UploadURL']);
    $query = "DELETE FROM tbl_certificate WHERE CertificateID ='$CertificateID'";
    $userResult = mysqli_query($conn, $query);
    if($userResult == 1){
        $_SESSION['message'] = "Certificate Delete Successfully";
        header('Location: dashboard.php');
        exit();
    }else{
        $_SESSION['message'] = "Something Went Wrong";
        header('Location: dashboard.php');
        exit();
    }
}
?>