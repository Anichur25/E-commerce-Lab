<html>  
    <head>  
        <title>Live Poll System in PHP Mysql using Ajax</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>  
    <body>  
        <div class="container">  
            <br />  
            <br />
   <br />
   <h2 align="center">Live Poll System in PHP Mysql using Ajax</h2><br />
   <div class="row">
    <div class="col-md-6">
     <form method="post" id="poll_form" action = "/show_info">
     @csrf
      <h3>Which is Best PHP Framework in 2018?</h3>
      <br />
      <input type = "text" placeholer = "Enter your id" name = "idnumber">
      <div class="radio">
       <label><h4><input type="radio" name="poll_option" class="poll_option" value="Laravel" /> Laravel</h4></label>
      </div>
      <div class="radio">
       <label><h4><input type="radio" name="poll_option" class="poll_option" value="CodeIgniter" /> CodeIgniter</h4></label>
      </div>
      <div class="radio">
       <label><h4><input type="radio" name="poll_option" class="poll_option" value="CakePHP" /> CakePHP</h4></label>
      </div>
      <div class="radio">
       <label><h4><input type="radio" name="poll_option" class="poll_option" value="Symfony" /> Symfony</h4></label>
      </div>
      <div class="radio">
       <label><h4><input type="radio" name="poll_option" class="poll_option" value="Phalcon" /> Phalcon</h4></label>
      </div>
      <br />
      <input type="submit" name="poll_button" id="poll_button" class="btn btn-primary" />
     </form>
     <br />
    </div>
    <div class="col-md-6">
     <br />
     <br />
     <br />
     <h4>Live Poll Result</h4><br />
     <div id="poll_result"></div>
    </div>
   </div>
   
   <br />
   <br />
   <br />
  </div>
    </body>  
</html>