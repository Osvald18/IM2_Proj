<html>
<head>

</head>
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
<tr><td><h4>Enter the Student Information</h4></td></tr>

<tr><td><input type="text" class="w-input" maxlength="256" name="lname" data-name="Field" placeholder="Last Name" id="lname" required=""></td></tr>
<tr><td><input type="text" class="w-input" maxlength="256" name="fname" data-name="Field" placeholder="First Name" id="fname" required=""></td></tr>
<tr><td><input type="text" class="w-input" maxlength="256" name="mname" data-name="Field" placeholder="Middle Name / Middle Initial" id="mname" required=""></td></tr>

<tr><td><select name = "grlvl" id = "grlvl" class="w-input">
<option>GRADE 1</option>
<option>GRADE 2</option>
<option>GRADE 3</option>
<option>GRADE 4</option>
<option>GRADE 5</option>
<option>GRADE 6</option>
</select></td></tr>

<tr><td><select name = "subject" id = "subject" class="w-input">
<option>Science</option>
<option>Social Studies</option>
<option>Mathematics</option>
<option>English</option>
<option>Filipino</option>
<option>ICT</option>
</select></td></tr>

<tr><td><input type="text" class="w-input" maxlength="256" name="teacher" data-name="Field 2" placeholder="Teacher's Name (Last Name, First Name MI)" id="teacher" required=""></td></tr>

<tr><td><select name = "term" id = "term" class="w-input">
<option>Term 1</option>
<option>Term 2</option>
<option>Term 3</option>
</select></td></tr>

<tr><td><input type="text" class="w-input" maxlength="256" name="schoolyr" data-name="Field 2" placeholder="School Year (SY-YYYY-YYYY)" id="schoolyr" required=""></td></tr>

<tr><td><input type="submit" value="Submit" data-wait="Please wait..." class="submit-button w-button"></td></tr>

</form>
</table>

<?php

if(empty($_POST ["mname"]) || empty($_POST ["lname"]) || empty($_POST ["fname"]) || empty($_POST ["grlvl"]) || empty($_POST ["subject"]) || empty($_POST ["teacher"]) || empty($_POST ["term"]) || empty($_POST ["schoolyr"]))
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

$fname = mysqli_real_escape_string($conn, $_POST ["fname"]);
$mname = mysqli_real_escape_string($conn, $_POST ["mname"]);	
$lname = mysqli_real_escape_string($conn, $_POST ["lname"]);
$grlvl = mysqli_real_escape_string($conn, $_POST ["grlvl"]);
$subject = mysqli_real_escape_string($conn, $_POST ["subject"]);
$teacher = mysqli_real_escape_string($conn, $_POST ["teacher"]);
$term = mysqli_real_escape_string($conn, $_POST ["term"]);
$schoolyr = mysqli_real_escape_string($conn, $_POST ["schoolyr"]);
$sname = $fname . $mname . $lname; 

	
// store data in session variable through user
 
$_SESSION['lname']= $_POST['lname']; 
$_SESSION['mname']= $_POST['mname']; 
$_SESSION['fname']= $_POST['fname']; 


$_SESSION['grlvl']= $_POST['grlvl'];  
$_SESSION['term']= $_POST['term'];
$_SESSION['schoolyr']= $_POST['schoolyr'];   
	


$sql = "INSERT INTO student (sname, fname, mname, lname, grlvl, subject, teacher, term, schoolyr,  studrec_ID)
VALUES ('$sname', '$fname', '$mname','$lname','$grlvl', '$subject', '$teacher', '$term', '$schoolyr', '$fname$mname$lname$grlvl$term$schoolyr')";

if (mysqli_query($conn, $sql)) {
error_reporting(0);
ini_set('display_errors', 0);
echo "<h3>";
echo "Student record successfully submitted";
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