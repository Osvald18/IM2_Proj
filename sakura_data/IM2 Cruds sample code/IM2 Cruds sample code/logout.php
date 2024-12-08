<html>
<head></head>

<body>
<form method = "POST">
<table class="menu3">

<?php
session_start();
unset($_SESSION['username']);
session_destroy();
echo "<script type='text/javascript'>alert('You are Logged Out')</script>";
?>


<tr><td>
<a href="login.php">Click here to login again</a>
</td></tr>
</table>
</form>
</body>
</html>
