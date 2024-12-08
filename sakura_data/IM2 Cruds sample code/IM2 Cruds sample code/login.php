<html>
<head></head>

<body>
<form method = "POST">
<table class="bodytable">
<tr><td><h4>Enter your username and password to login:</h4></td></tr>

<tr><td><input type="text" class="w-input" maxlength="256" name="uname" data-name="Field" placeholder="Userame" id="uname" required=""></td></tr>
<tr><td><input type="password" class="w-input" maxlength="256" name="password" data-name="Field 2" placeholder="Password" id="password" required=""></td></tr>


<tr><td><input type="submit" value="Submit" data-wait="Please wait..." class="submit-button w-button"></td></tr>
</table>
</form>
</body>
</html>




<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'automation');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $uname = mysqli_real_escape_string($db,$_POST['uname']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT username, password, usertype FROM login WHERE username = '$uname' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("username");
		 session_start(); 

         $_SESSION['uname'] = $uname;
         header("location: welcomepage.php");
      }else {
         echo "<h3>Incorrect Userame or Password Please try again</h3>";
      }
   }
?>