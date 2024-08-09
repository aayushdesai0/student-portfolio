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
    <title>Login - Student Portfolio Hub</title>
    <style>
         body{
        background: rgb(34,193,195);
        background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(121,32,153,1) 86%);
        background-attachment: fixed;
        margin:0;
        font-family: 'Poppins', sans-serif;
    }
    #form{
        width:400px;
        margin:70px auto 0 auto;
        background-color: whitesmoke;
        border-radius: 5px;
        padding:30px;
    }
    *{
        margin:1px;
        padding: 1px;
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
    .input-group input{
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
<body class="body">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mt-4 card card-body shadow">

                    <form action="login-code.php" method="POST" id="form">
                    <h1 classs="h1">Login</h1>
                        <div class="input-group">
                            <label>Email Id<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" />
                        </div>
                        <div class="input-group">
                            <label>Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" />
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
                        <div>
                            <button type="submit" name="loginBtn" class="btn btn-primary w-100">Login Now</button>
                        </div>
                        <div class="text-center">
                            <a href="index.php">Go to Home Page</a>
                            <br/>
                            <br/>
                            <a href="register.php">Click here to Register</a>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    

 

</body>
</html>


