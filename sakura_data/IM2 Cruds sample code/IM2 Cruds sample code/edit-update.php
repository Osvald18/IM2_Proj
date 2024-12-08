<html>
<head>

</head>
<body>
</table>

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


<table class = "edittable">
<form method = "POST">

<tr><td><h4>Enter the Student Information</h4></td></tr>

<tr><td><label>Student Last Name:</label></td></tr>

<tr><td><input type="text" class="w-input" maxlength="256" name="lname" data-name="Field" placeholder="Last Name" id="lname" required=""></td></tr>

<tr><td><label>Student First Name:</label></td></tr>

<tr><td><input type="text" class="w-input" maxlength="256" name="fname" data-name="Field" placeholder="First Name" id="fname" required=""></td></tr>

<tr><td><label>Student Middle Name / MI:</label></td></tr>

<tr><td><input type="text" class="w-input" maxlength="256" name="mname" data-name="Field" placeholder="Middle Name / Middle Initial" id="mname" required=""></td></tr>

<tr><td><label>Grade Level:</label></td></tr>

<tr><td><select name = "grlvl" id = "grlvl" class="w-input">
<option>GRADE 1</option>
<option>GRADE 2</option>
<option>GRADE 3</option>
<option>GRADE 4</option>
<option>GRADE 5</option>
<option>GRADE 6</option>
</select></td></tr>

<tr><td><label>Subject:</label></td></tr>

<tr><td><select name = "subject" id = "subject" class="w-input">
<option>Science</option>
<option>Social Studies</option>
<option>Mathematics</option>
<option>English</option>
<option>Filipino</option>
<option>ICT</option>
</select></td></tr>

<tr><td><label>Teacher's Name:</label></td></tr>

<tr><td><input type="text" class="w-input" maxlength="256" name="teacher" data-name="Field 2" placeholder="Teacher's Name (Last Name, First Name MI)" id="teacher" required=""></td></tr>

<tr><td><label>Term:</label></td></tr>

<tr><td><select name = "term" id = "term" class="w-input">
<option>Term 1</option>
<option>Term 2</option>
<option>Term 3</option>
</select></td></tr>

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


<tr><td><input type="submit" value="Submit" data-wait="Please wait..." class="submit-button w-button">
<a href="javascript:show_popup('my_popup')">Show updated student information submitted</a>
</td></tr>
</table>

<script>
function show_popup(id) {
	if (document.getElementById){ 
		obj = document.getElementById(id); 
		if (obj.style.display == "none") { 
			obj.style.display = ""; 
		} 
	} 
}
function hide_popup(id){ 
	if (document.getElementById){ 
		obj = document.getElementById(id); 
		if (obj.style.display == ""){ 
			obj.style.display = "none"; 
		} 
	} 
}
</script>

<div id="my_popup" style="display:none; border:1px dotted #014421; padding:.3em; background-color:#f7e2a6; position:absolute; width:1000px; height:auto; left:250px; top:250px">
	<div align="right">
		<a href="javascript:hide_popup('my_popup')">close</a>
	</div>

		
		
		<?php
		$studID = $_POST ["studID"];

		$fname = $_POST ["fname"];
		$mname = $_POST ["mname"];	
		$lname = $_POST ["lname"];
		$grlvl = $_POST ["grlvl"];
		$subject = $_POST ["subject"];
		$teacher = $_POST ["teacher"];
		$term = $_POST ["term"];
		$schoolyr = "SY-2019-2020";
		//pop-up window to confirm data to be edited
		echo"<table class = \"popupwin\">";	
		echo"<tr><h4 style=\"margin-left:250px; top:250px\">Submitted updated student information</h4></tr>";
		echo "<tr>"; 
        echo"<td style = \"padding-left: 10px; padding-right: 10px;\">First Name</td>"; 
        echo"<td style = \"padding-left: 20px; padding-right: 20px;\">Middle Name</td>"; 
        echo"<td style = \"padding-left: 20px; padding-right: 20px;\">Last Name</td>"; 
		echo"<td style = \"padding-left: 20px; padding-right: 20px;\">Grade Level</td>"; 
		echo"<td style = \"padding-left: 20px; padding-right: 20px;\">Subject</td> ";
        echo"<td style = \"padding-left: 20px; padding-right: 20px;\">Teacher</td> ";
        echo"<td style = \"padding-left: 20px; padding-right: 20px;\">Term</td> ";
        echo"<td style = \"padding-left: 20px; padding-right: 20px;\">School Year</td>"; 
		echo "</tr>"; 		
			echo "<tr>"; 
                  echo"<td style = \"padding-left: 10px; padding-right: 10px;\">$fname</td>"; 
				  echo"<td style = \"padding-left: 20px; padding-right: 20px;\">$mname</td>"; 
                  echo"<td style = \"padding-left: 20px; padding-right: 20px;\">$lname</td>"; 
                  echo"<td style = \"padding-left: 20px; padding-right: 20px;\">$grlvl</td>"; 
				  echo"<td style = \"padding-left: 20px; padding-right: 20px;\">$subject</td>"; 
				  echo"<td style = \"padding-left: 20px; padding-right: 20px;\">$teacher</td>";
				  echo"<td style = \"padding-left: 20px; padding-right: 20px;\">$term</td>";
				  echo"<td style = \"padding-left: 20px; padding-right: 20px;\">$schoolyr</td>";
            echo"</tr>";
			echo"</table>";
		
		?>
</div>		
<?php

if(empty($_POST ["mname"]) || empty($_POST ["lname"]) || empty($_POST ["fname"]) || empty($_POST ["grlvl"]) || empty($_POST ["subject"]) || empty($_POST ["teacher"]) || empty($_POST ["term"]) ||  empty($_POST ["studID"]))
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

$studID = mysqli_real_escape_string($conn, $_POST ["studID"]);

$fname = mysqli_real_escape_string($conn, $_POST ["fname"]);
$mname = mysqli_real_escape_string($conn, $_POST ["mname"]);	
$lname = mysqli_real_escape_string($conn, $_POST ["lname"]);
$grlvl = mysqli_real_escape_string($conn, $_POST ["grlvl"]);
$subject = mysqli_real_escape_string($conn, $_POST ["subject"]);
$teacher = mysqli_real_escape_string($conn, $_POST ["teacher"]);
$term = mysqli_real_escape_string($conn, $_POST ["term"]);
$schoolyr = "SY-2019-2020";

	
/* store data in session variable through user
 
$_SESSION['lname']= $_POST['lname']; 
$_SESSION['mname']= $_POST['mname']; 
$_SESSION['fname']= $_POST['fname']; 


$_SESSION['grlvl']= $_POST['grlvl'];  
$_SESSION['term']= $_POST['term'];
$_SESSION['schoolyr']= $_POST['schoolyr'];   */
	

$sql = "UPDATE  student SET fname = '$fname', mname = '$mname', lname = '$lname', grlvl = '$grlvl',  subject = '$subject', teacher = '$teacher', term = '$term', schoolyr = '$schoolyr', studrec_ID='$studID' WHERE studrec_ID = '$studID'";


if (mysqli_query($conn, $sql)) {
error_reporting(0);
ini_set('display_errors', 0);
echo "<h3>";
echo "Student record successfully updated";
echo "</h3>";


}

else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
</form>

</body>
</html>