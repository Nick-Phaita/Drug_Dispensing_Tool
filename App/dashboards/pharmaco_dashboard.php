<?php 
require_once("../connection.php");
session_start();


if (isset( $_SESSION['loggedin'])) {
    $sql = "SELECT * FROM PharmaCo WHERE Username ='$_SESSION[Username]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
    }
    $_SESSION['CompanyID'] = $row['CompanyID'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmaceutical Company Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1 style="text-align: right;">Hello, <?php echo $_SESSION['Names']; ?></h1>
     <p style="text-align: left;"><a href="../signout.php">Sign Out</a></p>
     <p><a href="../update/edit_user.php">Edit Profile</a></p>
     <p><a href="../update/edit_pharmaco.php">Edit Details</a></p>
     <p><a href="../add/add_contract.php">Sign Contract</a></p>
     <p><a href="../add/add_drug.php">Add Drug</a></p>
     <p><a href="../view/view_contracts.php">View Contracts</a></p>
     <p><a href="../view/view_drugs.php">View Drugs</a></p>
     <p><a href="../view/view_pharmacies.php">View Pharmacies</a></p>
     <p><a href="../view/view_supervisors.php">View Supervisors</a></p>

</body>
</html>

<?php 
}else{
    header("Location: /App/login.html");
    exit();
}
?>