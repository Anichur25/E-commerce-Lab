<?php
  
  include('scripts.php');
  if(isset($_POST['send']))
  {
    
      $username = $_POST['user'];
      $email = $_POST['email'];
      $password = $_POST['pass'];
      $confirmpass = $_POST['cpassword'];
      $connect = mysqli_connect('localhost','root','','labtask');
 
  if($password == $confirmpass)
  {
      
     $sql = "INSERT INTO `registration`(`UserName`, `Email`, `Password`) VALUES ('$username','$email','$password')";
     mysqli_query($connect,$sql);
     
  }
  else echo "password does not match";
}
?>
<html>
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

        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Create Account</h4>
                <form action="signup.php" method="post">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="user" class="form-control" placeholder="User name" type="text" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email address" type="email" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="pass" class="form-control" placeholder="Create password" type="password" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="cpassword" class="form-control" placeholder="Confirm password" type="password"
                            required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="send" class="btn btn-success btn-block"> Create Account </button>
                    </div>
                    <p class="text-center">Have an account? <a href="./login.php">Log In</a> </p>
                </form>
            </article>
        </div>

    </div>
</body>

</html>