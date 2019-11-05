<?php
  
  include('scripts.php');
  if(isset($_POST['newEntry']))
   header('Location: ../PHP/entry.php');
   if(isset($_POST['showinfo']))
    header('Location: ../PHP/show_info.php');
?>

<html>

<body>
    <div class="container">
         <form action = "welcome.php" method = "POST">
         <button type="submit" class="btn btn-success" name = "newEntry">Add new entry </button>
        <button type="submit" class="btn btn-primary" name="showinfo">Show address book </button>
         </form>
        
    </div>
</body>

</html>
