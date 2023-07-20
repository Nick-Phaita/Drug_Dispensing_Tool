<?php 
session_start();

if (isset( $_SESSION['loggedin'])) {
    

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../styles/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
<div class="dashboard">
        <div class="header">
            <div class="icon">
                <h2 class="logo">Dispenzer</h2>
            </div>

            <div class="greetings">
                <h1><?php echo $_SESSION['Username']; ?></h1>
                <h3>Hello, <?php echo $_SESSION['Names']?></h3>
            </div>

            <h2>Doctor Dashboard</h2>
        </div>

        <hr>

        <div class="main">

            <div class="links-bar">
                <ul>
                    <li><a href="../update/edit_user.php">Edit Profile</a></li>
                    <li><a href="../update/edit_doctor.php">Edit Doctor Details</a></li>
                    <li><a href="../add/add_prescription.php">Make prescription</a></li>
                    <li><a href="../view/view_prescriptions.php">View Prescriptions</a></li>
                    <li><a href="../view/view_inventory.php">View Drugs</a></li>
                    <li><a href="../view/view_patients.php">View Patients</a></li>
                    <li><a href="../signout.php">Sign Out</a></li>
                </ul>
    
            </div>

        
            <div class="capabilities">
                <h2>Access all functionalities from the sidebar. Hover over each below to see what you can do.</h2>
                <div class="capability">
                    <h4>Edit Profile</h4>
                    <p>Update your user details such as your Username and Password.</p>
                </div>

                <div class="capability">
                    <h4>Edit Doctor Details</h4>
                    <p>Update your Doctor details.</p>
                </div>

                <div class="capability">
                    <h4>Make Prescriptions</h4>
                    <p>Allows you to make prescriptions</p>
                </div>

                <div class="capability">
                    <h4>View Prescriptions</h4>
                    <p>View all prescriptions made for you so far.</p>
                </div>

                <div class="capability">
                    <h4>View Drugs</h4>
                    <p>View all drugs offered.</p>
                </div>

                <div class="capability">
                    <h4>View Patients</h4>
                    <p>View all patients in the system.</p>
                </div>

                <div class="capability">
                    <h4>Sign Out</h4>
                    <p>Logout from your account.</p>
                </div>
                
            </div>

            
        
        </div>

    </div>
     
</body>
</html>

<?php 
}else{
    header("Location: /App/login.html");
    exit();
}
?>