<?php 
session_start();

if (isset( $_SESSION['loggedin'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmacist Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1 style="text-align: right;">Hello, <?php echo $_SESSION['Names']; ?></h1>
     <p style="text-align: left;"><a href="../signout.php">Sign Out</a></p>
     <p><a href="../update/edit_user.php">Edit Profile</a></p>
     <p><a href="../update/edit_pharmacist.php">Edit Details</a></p>
     <p><a href="../add/add_dispensation.php">Make dispensation</a></p>
     <p><a href="../view/view_prescriptions.php">View Prescriptions</a></p>
     <p><a href="../view/view_patients.php">View Patients</a></p>
     <p><a href="../view/view_inventory.php">View Inventory</a></p>
     <p><a href="../view/view_doctors.php">View Doctors</a></p>
     <p><a href="../view/view_dispensations.php">View Dispensations</a></p>
</body>
</html>

<?php 
}else{
    header("Location: /App/login.html");
    exit();
}
?>