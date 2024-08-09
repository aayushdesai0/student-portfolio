<?php
@session_start();
if(isset($_SESSION['loggedInStatus'])){
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Student Portfolio Hub</title>
    <style>
         body{
        background: rgb(34,193,195);
        background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(121,32,153,1) 86%);
        background-attachment: fixed;
        margin:0;
        font-family: 'Poppins', sans-serif;
    }
    *{
        margin:1px;
        padding: 1px;
    }
    #form{
        width:400px;
        margin:3px auto 0 auto;
        background-color: whitesmoke;
        border-radius: 5px;
        padding:30px;
    }
    h1{
        text-align: center;
        color:#792099;
    }
    #form button{
        background-color: #792099;
        color:white;
        border: 1px solid #792099;
        border-radius: 5px;
        padding:10px;
        margin:20px 0px;
        cursor:pointer;
        font-size:20px;
        width:100%;
    }
    .input-group{
        display:flex;
        flex-direction: column;
        margin-bottom: 15px;
    }
    .input-group input, .input-group select{
        border-radius: 5px;
        font-size:20px;
        margin-top:5px;
        padding:10px;
        border:1px solid rgb(34,193,195) ;

    }

    .input-group input:focus{
        outline:0;
    }
   
     .input-group .error{
        color:rgb(242, 18, 18);
        font-size:16px;
        margin-top: 5px;
    }
   
    .input-group.success input{
        border-color: #0cc477;
    }
   
    .input-group.error input{
        border-color:rgb(206, 67, 67);
    }

    .text-danger{
        color:red;
    }
    .alert.alert-warning {
    color: red;
}

    </style>
 
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mt-4 card card-body shadow">

                    <form action="register-code.php" method="POST" id="form">
                        <h1>Registration</h1>
                        <div class="input-group">
                            <label>Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="input-group">
                            <label>Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control" />
                        </div>
                        <div class="input-group">
                            <label>Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" />
                        </div>
                        <div class="input-group">
                            <label>Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" />
                        </div>

                        <div class="input-group">
                            <label>Semester<span class="text-danger">*</span></label>
                            <select name="semester" class="form-control">
                                <option>sem-1</option>
                                <option>sem-2</option>
                                <option>sem-3</option>
                                <option>sem-4</option>
                                <option>sem-5</option>
                                <option>sem-6</option>
                            </select>
                        </div>


                         <div class="input-group">
                            <label>Department<span class="text-danger">*</span></label>
                            <select name="department" class="form-control">
                            <option>Select Your Department</option>
                                <option>BCA</option>
                                <option>MCA</option>
                                <option>B.Tech</option>
                            </select>
                        </div>


                        <?php
                            if(isset($_SESSION['errors']) && count($_SESSION['errors']) > 0){
                                foreach($_SESSION['errors'] as $error){
                                    ?>
                                    <div class="alert alert-warning"><?= $error; ?></div>
                                    <?php
                                }
                                unset($_SESSION['errors']);
                            }

                            if(isset($_SESSION['message'])){
                                echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
                                unset($_SESSION['message']);
                            }
                            ?>

                        <div class="input-group">
                            <button type="submit" name="registerBtn" class="btn btn-primary w-100">Register</button>
                        </div>
                        <div class="text-center">
                            <a href="login.php">Click here to Login</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    

   

</body>
</html>
