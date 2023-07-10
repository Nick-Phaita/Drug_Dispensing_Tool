<?php 
session_start();

if (isset( $_SESSION['loggedin'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1 style="text-align: right;">Hello, <?php echo $_SESSION['Names']; ?></h1>
     <p style="text-align: left;"><a href="../signout.php">Sign Out</a></p>
     <p><a href="../update/edit_user.php">Edit Profile</a></p>
     <p><a href="../update/edit_patient.php">Edit Patient Details</a></p>
     <p><a href="../view/view_prescriptions.php">View Prescriptions</a></p>
     <p><a href="../view/view_dispensations.php">View Current Medication</a></p>
</body>
</html>

<?php 
}else{
    header("Location: /App/login.html");
    exit();
}
?>