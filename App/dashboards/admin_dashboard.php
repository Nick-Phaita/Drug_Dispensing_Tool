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
     <h1 style="text-align: right;">Hello, Administrator</h1>
     <p style="text-align: left;"><a href="../signout.php">Sign Out</a></p>
     <p><a href="../update/edit_user.php">Edit Profile</a></p>
     <p><a href="../add/add_pharmacy.php">Add pharmacy</a></p>
     <p><a href="../view/view_users.php">View Users</a></p>
</body>
</html>

<?php 
}else{
    header("Location: /App/login.html");
    exit();
}
?>