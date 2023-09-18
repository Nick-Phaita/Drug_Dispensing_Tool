<?php 
session_start();

if (isset( $_SESSION['loggedin'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmacist Dashboard</title>
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

            <h2>Pharmacist Dashboard</h2>
            <h2 id="logmsg"><?php echo $_SESSION['mmsg'];
            $_SESSION['mmsg']="";
             ?></h2>
        </div>
        <script>
            setTimeout(function(){
                var msg=document.getElementById("logmsg");
                msg.parentNode.removeChild(msg);
            }, 2000);</script>
        <hr>

        <div class="main">

            <div class="links-bar">
                <ul>
                    <li><a href="../update/edit_user.php">Edit Profile</a></li>
                    <li><a href="../update/edit_pharmacist.php">Edit Details</a></li>
                    <li><a href="../view/view_prescriptions.php">View Prescriptions</a></li>
                    <li><a href="../add/add_dispensation.php">Make dispensation</a></li>
                    <li><a href="../view/view_dispensations.php">View Dispensation</a></li>
                    <li><a href="../view/view_patients.php">View Patients</a></li>
                    <li><a href="../view/view_inventory.php">View Inventory</a></li>
                    <li><a href="../view/view_doctors.php">View Doctors</a></li>
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
                    <h4>Edit Details</h4>
                    <p>Update your pharmacist details.</p>
                </div>

                <div class="capability">
                    <h4>View Prescriptions</h4>
                    <p>View all prescriptions made for you so far.</p>
                </div>

                <div class="capability">
                    <h4>Make dispensation</h4>
                    <p>Make a dispensation to a patient.</p>
                </div>

                <div class="capability">
                    <h4>View dispensation</h4>
                    <p>View all drugs dispensed to patients.</p>
                </div>

                <div class="capability">
                    <h4>View patients</h4>
                    <p>View all recorded patients in the system.</p>
                </div>

                <div class="capability">
                    <h4>View Inventory</h4>
                    <p>View the entire stock found in the system.</p>
                </div>

                <div class="capability">
                    <h4>View Doctors</h4>
                    <p>View all doctors in the system.</p>
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