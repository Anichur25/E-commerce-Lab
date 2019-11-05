<?php 
  
  include('scripts.php');
  session_start();
  $userid = $_SESSION['id'];
  $entryid = $_COOKIE['itemno'];
  $connect = mysqli_connect('localhost','root','','labtask');
  

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
                <input name="nickname" class="form-control col-md-6" type="text" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">

            </div>
            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Address</span>
                </div>
                <input name="address" class="form-control col-md-6" type="text" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">
            </div>

            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">DOB</span>
                </div>
                <input name="dob" class="form-control col-md-6" type="text" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">

            </div>
            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Website</span>
                </div>
                <input name="website" class="form-control col-md-6" type="text" disabled aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm">

            </div>
            <div class="form-group input-group input-group-lg">
                <div class="col-md-3"></div>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Phone Number(s)</span>
                   
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $('#fname').val(<?php echo $entryid ?>);
});
</script>