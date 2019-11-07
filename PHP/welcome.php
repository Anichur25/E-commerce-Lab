<?php
  
  include('scripts.php');
  if(isset($_POST['newEntry']))
   header('Location: ../PHP/entry.php');
   if(isset($_POST['showinfo']))
    header('Location: ../PHP/show_info.php');
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
                    <a class="nav-link" href="../PHP/login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-body">
            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">UserName</span>
                </div>
                <input class="form-control col-md-6" type="text" id = "fname" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">

            </div>
                <form action="welcome.php" method="POST">
                    <button type="submit" class="btn btn-success" name="newEntry">Add new entry </button>
                    <button type="submit" class="btn btn-primary" name="showinfo">Show address book </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>