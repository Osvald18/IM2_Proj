<html>
<head></head>
<body>

<?php
session_start(); 

$uname = $_SESSION['uname'];
echo"<h5 class=\"mysession\">";
echo "<br/>";
echo "Welcome";
echo "&nbsp;&nbsp;&nbsp;";
echo $uname;
echo "<br/>";
echo"</h5>";

?>

<table class="mainpage">
<tr>
<?PHP
echo"<h5 class=\"mysession\">";
echo "You are currently working on";
echo "&nbsp;&nbsp;&nbsp;";
echo $_SESSION['schoolyr'];
echo "<br/>";
echo"</h5>";
?>
</tr>
</table>

<table class="studrecinput">
<form method = "POST">
<tr><td><h4>Select the record you want to delete</h4></td></tr>

<tr><td><label>Student ID:</label></td></tr>

<tr>
<?PHP
$username = "root"; 
$password = ""; 
$database = "sageautomation"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT studrec_ID FROM student";

echo"<td><select name = \"studID\" id = \"studID\" class=\"w-input\" >";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
      $studID = $row["studrec_ID"];
	  echo"<option>";
	  echo $row["studrec_ID"];
	  echo "</option>";
}}
echo"</select></td></tr>";

?>


<tr><td><input type="submit" value="Submit" data-wait="Please wait..." class="submit-button w-button"></td></tr>

</form>
</table>

<?php

if(empty($_POST ["studID"]))
{ 
	echo"<h3>";
	echo "Please Fill all the required field"; 
	echo"</h3>";

}
else{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sageautomation";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

//data validation

$studID = mysqli_real_escape_string($conn, $_POST ["studID"]);



//$projrecid = $projdescID$schoolyr$term;
	
//computation for projFG and projFGperc

//$assperc = ($assignscore / $assignperf)*100; 

// store data in session variable through user
 
//$_SESSION['lname']= $_POST['lname']; 
//$_SESSION['mname']= $_POST['mname']; 
//$_SESSION['fname']= $_POST['fname']; 


//$_SESSION['grlvl']= $_POST['grlvl'];  
//$_SESSION['term']= $_POST['term'];
//$_SESSION['schoolyr']= $_POST['schoolyr'];   
	


$sql = "DELETE FROM student WHERE studrec_ID = '$studID'";

if (mysqli_query($conn, $sql)) {
error_reporting(0);
ini_set('display_errors', 0);
echo "<h3>";
echo "Student Record successfully deleted";
echo "</h3>";
}

else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>


</body>
</html>