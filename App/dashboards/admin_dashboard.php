<?php 
session_start();

if (isset( $_SESSION['loggedin'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1 style="text-align: right;">Hello, <?php echo $_SESSION['Names']; ?></h1>
     <p style="text-align: left;"><a href="../signout.php">Sign Out</a></p>
</body>
</html>

<?php 
}else{
    header("Location: login.html");
    exit();
}
?>