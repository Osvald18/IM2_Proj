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

<table>
<form method = "POST" action="viewstudentry.php">
<td ><label>Grade Level:</label></td>


<td><select name ="gradelvl"  style="width: 150px; height: 35px; margin-left: -90px; margin-bottom: 30px;" placeholder="Select Grade Level">
<option>GRADE 1</option>
<option>GRADE 2</option>
<option>GRADE 3</option>
<option>GRADE 4</option>
<option>GRADE 5</option>
<option>GRADE 6</option>
</select></td>

<td ><label>Student Name:</label></td>

<?PHP
$username = "root"; 
$password = ""; 
$database = "sageautomation"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT sname FROM student";

echo"<td><select name = \"sname\" id = \"sname\" style=\"margin-left: -90px; width: 200px; height: 35px; margin-bottom: 30px;\" class=\"w-input\">";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
      $sname = $row["sname"];
	  echo"<option>";
	  echo $row["sname"];
	  echo "</option>";
}}
echo"</select></td>";

?>

<td><input type="submit" style="width: 80px; height: 35px; margin-left: -90px;"></td>
</form>
</tr>
</table>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sageautomation";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$showRecordPerPage = 1;

if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}

else{
$currentPage = 1;
}

$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT studrec_ID, sname, fname, mname, lname,  grlvl, subject, teacher, term, schoolyr FROM student";

$allEmpResult = mysqli_query($conn, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);

$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;

$empSQL = "SELECT studrec_ID, sname, fname, mname, lname,  grlvl, subject, teacher, term, schoolyr
FROM student LIMIT $startFrom, $showRecordPerPage";

$empResult = mysqli_query($conn, $empSQL);


?>

<table class="disptable">
<thead>
<tr>
<th>Student ID</th>
<th>Last Name</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Grade Level</th>
<th>Subject</th>
<th>Teacher</th>
<th>Term</th>
<th>School Year</th>

</tr>
</thead>

<tbody>


<?php
while($emp = mysqli_fetch_assoc($empResult)){
?>
<tr>
<td><a href="gradesview.php">
	<?php	
	echo $emp['sname']; 	
	?>
	</a></td>
<td><?php echo $emp['lname']; ?></td>
<td><?php echo $emp['fname']; ?></td>
<td><?php echo $emp['mname']; ?></td>
<td><?php echo $emp['grlvl']; ?></td>
<td><?php echo $emp['subject']; ?></td>
<td><?php echo $emp['teacher']; ?></td>
<td><?php echo $emp['term']; ?></td>
<td><?php echo $emp['schoolyr']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>

<nav aria-label="Page navigation">
<ul class="pagination">
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>
<?php if($currentPage >= 2) { ?>

<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>

<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
<?php if($currentPage != $lastPage) { ?>

<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>

<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php } ?>
</ul>
</nav>

</body>
</html>