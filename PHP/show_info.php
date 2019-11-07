<?php include('scripts.php');
  session_start();
  $userid = intval($_SESSION['id']);
?>
<html>
<body>
   
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <th>FullName</th>
                <th>NickName</th>
                <th>Address</th>
                <th>Website</th>
                <th>DOB</th>
                <th>Phone Number(s)</th>
                <th>Action</th>
                <?php
                 global $tag;
               
             $connect = mysqli_connect('localhost','root','','labtask');
             $sql = "SELECT `FullName`, `NickName`, `Address`, `Website`, `DOB` FROM `entry` WHERE entry.ID = $userid";
             $phnNum = "SELECT `phone` FROM `phone` WHERE phone.ID = $userid";
             $record = mysqli_query($connect,$sql);
             $data = mysqli_query($connect,$phnNum);
             $counter = 0;
             
             while($row = $record -> fetch_assoc())
             {
                 ++$counter;
                 $tagcolor = ($counter % 2 == 0)? 'table-success' : 'table-info';
                $num = $data -> fetch_assoc();
                $tag = "<tr>".
                "<td>".$row["FullName"]."</td>".
                "<td>".$row["NickName"]."</td>".
                "<td>".$row["Address"]."</td>".
                "<td>".$row["Website"]."</td>".
                "<td>".$row["DOB"]."</td>".
                "<td>".$num["phone"]."</td>".
                "<td>"."<button type = 'button' class = 'btn btn-success' id = $counter onclick = 'getID(this.id)'>Details</button>".
                "<button type = 'button' class = 'btn btn-primary' style = 'margin-left:5px;'>Edit</button></td></tr>";
                echo $tag;
             }
             echo "</table>";
          ?>

        </div>
    </div>
</body>
<html>

<script>
  function getID(clicked_id)
  {
     document.cookie = "itemno = " + clicked_id;
     location.replace('../PHP/details.php');
  }
</script>