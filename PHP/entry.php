<?php
   
    global $numberOfentry;
   include('scripts.php');
   
   session_start();
   $userName = $_SESSION['username'];
   $password = $_SESSION['password'];
   $userid = $_SESSION['id'];

   if(isset($_POST['send']))
   {
      
       $connect = mysqli_connect('localhost','root','','labtask');

       if($connect)
       {
        
            $numberOfentry = 0;
            $FullName = $_POST['fullname'];
            $NickName = $_POST['nickname'];
            $Website = $_POST['website'];
            $Address = $_POST['address'];
            $Dob = $_POST['dob'];
            $PhoneNumbers = $_POST['name'];
            
            $sql = "SELECT `ID` FROM `registration` WHERE registration.UserName = $userName";
            $entrycnt = "SELECT `TotalEntry` FROM `entrycount` WHERE entrycount.ID = $userid";
            $result = mysqli_query($connect,$entrycnt);
            
            if($result -> num_rows == 0)
            {
                $numberOfentry = 1;
                $entrycnt = "INSERT INTO `entrycount`(`ID`, `TotalEntry`) VALUES ($userid,1)";
               
                 mysqli_query($connect,$entrycnt); 
            }
            else 
            {
                $result = $result -> fetch_assoc();
                $cnt = $result['TotalEntry'];
                $numberOfentry = $cnt + 1;
                $entrycnt = "UPDATE `entrycount` SET `TotalEntry`= $cnt + 1 WHERE entrycount.TotalEntry = $cnt";
                mysqli_query($connect,$entrycnt);
            }
           
            $sqlInsert = "INSERT INTO `entry`(`ID`, `FullName`, `NickName`, `Address`, `Website`, `DOB`,`entryNo`) VALUES ('$userid','$FullName','$NickName','$Address','$Website','$Dob','$numberOfentry')";
            mysqli_query($connect,$sqlInsert);

            for($idx = 0; $idx < count($PhoneNumbers); $idx++)
            {
                $Psql = "INSERT INTO `phone`(`ID`, `phone`,`entryNo`) VALUES ('$userid','$PhoneNumbers[$idx]',$numberOfentry)";
                mysqli_query($connect,$Psql);
            }
       }
      
   }
  
?>

<html>

<head>
    <link rel="stylesheet" href="../CSS/mystyle.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class = "display-4" align = "center">Add new entry</p>
            </div>
            <div class="card-body">
                <form action="entry.php" method="POST" id="entry">
                    <div class="form-group input-group input-group-lg">
                        <div class="col-md-3"></div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">FullName</span>
                        </div>
                        <input name="fullname" class="form-control col-md-6" type="text" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm" required>

                    </div>
                    <div class="form-group input-group input-group-lg">
                        <div class="col-md-3"></div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">NickName</span>
                        </div>
                        <input name="nickname" class="form-control col-md-6" type="text" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm" required>

                    </div>
                    <div class="form-group input-group input-group-lg">
                        <div class="col-md-3"></div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Address</span>
                        </div>
                        <input name="address" class="form-control col-md-6" type="text" required>
                    </div>

                    <div class="form-group input-group input-group-lg">
                        <div class="col-md-3"></div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">DOB</span>
                        </div>
                        <input name="dob" class="form-control col-md-6" type="date" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm" required>

                    </div>
                    <div class="form-group input-group input-group-lg">
                        <div class="col-md-3"></div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Website</span>
                        </div>
                        <input name="website" class="form-control col-md-6" type="text" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm" required>

                    </div>

                    <div class="form-group input-group input-group-lg">
                        <div class="col-md-3"></div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Phone Number(s)</span>
                            <span class="input-group-text" id="inputGroup-sizing-lg">1</span>
                        </div>
                        <input name="name[]" class="form-control col-md-6" type="text" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm" required>
                        <button type="button" class="btn btn-success add_btn">+</button>
                    </div>
                   <p id = "temp"> <button type="submit" name="send" class = "btn btn-primary" id="formsub">Save</button></p>

                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script>
$(document).ready(function() {

    var counter = 0,
        numbers = 1;
    $('.add_btn').click(function() {

        ++counter;
        ++numbers;
        var tag = '<div class="form-group input-group input-group-lg" id = "row' + counter + '">' +
            '<div class="col-md-5"></div>' +
            '<div class="input-group-prepend">' +
            '<span class="input-group-text" id="inputGroup-sizing-lg">' + numbers + '</span>' +
            '</div>' +
            '<input name="name[]" class="form-control col-md-6" type="text" required>' +
            '<button type = "button" class = "btn btn-danger btn_remove" id = "row' + counter +
            '">X</button>' +
            '</div>';

        $(tag).insertBefore('#formsub');
    });

    $(document).on('click', '.btn_remove', function() {

        var btnId = $(this).attr("id");
        $('#' + btnId).remove();
    });
});
</script>