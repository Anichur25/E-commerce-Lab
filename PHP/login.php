<?php
   
   include('scripts.php');
   
 if(isset($_POST['send']))
 {
     session_start();
     $user = $_POST['user'];
     $pass = $_POST['pass'];
     $connection = mysqli_connect("localhost", "root", "",  
                                                 "labtask"); 
    $query = "SELECT UserName,ID FROM registration WHERE registration.UserName = '$user' AND registration.Password = '$pass'"; 
    $result = mysqli_query($connection, $query); 
    
    if(mysqli_num_rows($result) == 1)
    {
        $Password = $result -> fetch_assoc();
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $pass;
        $_SESSION['id'] = $Password['ID'];
       
        header("Location: ../PHP/welcome.php");
    }
    
 }
?>

<html>

<head>
     
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Address Book</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../PHP/index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../PHP/signup.php">SignUp</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="../PHP/login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="card mt-5">
                    <div class="card-body">
                        <form action="login.php" method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user fa-2x"></i>
                                    </span>
                                </div>
                                <input type="text" name="user" class="form-control py-4" placeholder="User Name">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock fa-2x"></i>
                                    </span>
                                </div>
                                <input type="password" name="pass" class="form-control py-4" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="send" class="btn btn-success btn-block">Login</button>
                            </div>
                            <p class="text-center">Have no account? <a href="./signup.php">Sign Up</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>  