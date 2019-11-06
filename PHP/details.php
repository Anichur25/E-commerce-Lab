<?php 
  global $data;
  include('scripts.php');
  session_start();
  $userid = intval($_SESSION['id']);
  $entryid = intval($_COOKIE['itemno']);
  $connect = mysqli_connect('localhost','root','','labtask');
  $sql = "SELECT `FullName`, `NickName`, `Address`, `Website`, `DOB` FROM `entry` WHERE entry.ID = $userid AND entry.entryNo  = $entryid";
  $phn = "SELECT `phone` FROM `phone` WHERE phone.ID = $userid AND phone.entryNo = $entryid";
  $record = mysqli_query($connect,$sql);
  $numbers = mysqli_query($connect,$phn);
  $data = $record -> fetch_assoc();
  $row = $numbers -> fetch_assoc();
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">FullName</span>
                </div>
                <input name="fullname" class="form-control col-md-6" type="text" id = "fname" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">

            </div>
            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">NickName</span>
                </div>
                <input name="nickname" class="form-control col-md-6" type="text" id = "nname" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">

            </div>
            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Address</span>
                </div>
                <input name="address" class="form-control col-md-6" type="text" id = "address" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">DOB</span>
                </div>
                <input name="dob" class="form-control col-md-6" type="text" id = "dob" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">

            </div>
            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Website</span>
                </div>
                <input name="website" class="form-control col-md-6" type="text" id = "website" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">

            </div>
            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Phone Number(s)</span>
                </div>
               
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-lg">1</span>
            </div>
            <input class="form-control col-md-5" type="text" id = "input1" disabled>
            </div>
            
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
     
    $('#fname').val('<?php echo $data['FullName']?>');
    $('#nname').val('<?php echo $data['NickName']?>');
    $('#address').val('<?php echo $data['Address']?>');
    $('#dob').val('<?php echo $data['DOB']?>');
    $('#website').val('<?php echo $data['Website']?>');
    $('#input1').val('<?php echo $row['phone']?>');
    
    for(let idx = 2; idx <= <?php echo $numbers -> num_rows?>; idx++)
    {
        
       var tag =  '<div class="form-group input-group input-group-lg">' +
            '<div class="col-md-3"></div>' +
            '<div class="input-group-prepend">' +
            '<span class="input-group-text" id="inputGroup-sizing-lg">' + idx + '</span>' +
            '</div>' +
            '<input class="form-control" type="text" id = "input' + idx + '"disabled>' +
            '</div>';
        $('.card-body').append(tag);
    }

    <?php 
       $counter = 1;
       while($row = $numbers -> fetch_assoc())
       {
           ++$counter;
           $phnnumber = $row['phone'];
           $result = "$('#input$counter')";
           echo $result."."."val('$phnnumber');";
       }
    ?>

    $('.card-body').append('<p align = "center"> <button type="button" id = "back" class = "btn btn-primary">Back</button></p>');
   
   $('#back').on('click',function back()
   {
       location.replace('../PHP/show_info.php');
   }
   );
});
</script>