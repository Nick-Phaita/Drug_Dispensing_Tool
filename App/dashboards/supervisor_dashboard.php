<?php 
require_once("../connection.php");
session_start();

if (isset( $_SESSION['loggedin'])) {
    $sql = "SELECT * FROM Supervisor WHERE Username ='$_SESSION[Username]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
    }
    $_SESSION['PharmacyID'] = $row['PharmacyID'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Supervisor Dashboard</title>
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

            <h2>Supervisor Dashboard</h2>
        </div>

        <hr>

        <div class="main">

            <div class="links-bar">
                <ul>
                    <li><a href="../update/edit_user.php">Edit Profile</a></li>
                    <li><a href="../update/edit_supervisor.php">Edit Details</a></li>
                    <li><a href="../update/edit_pharmacy.php">Edit Pharmacy</a></li>
                    <li><a href="../add/add_inventory.php">Add inventory</a></li>
                    <li><a href="../view/view_inventory.php">View inventory</a></li>
                    <li><a href="../view/view_contracts.php">View Contract</a></li>
                    <li><a href="../view/view_drugs.php">View Drugs</a></li>
                    <li><a href="../view/view_supervisors.php">View Supervisors</a></li>
                    <li><a href="../view/view_pharmacos.php">View Pharmaceutical Companies</a></li>
                    <li><a href="../view/view_pharmacists.php">View Pharmacists</a></li>
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
                    <p>Update your supervisor details.</p>
                </div>

                <div class="capability">
                    <h4>Edit Pharmacy</h4>
                    <p>Update the pharmacy details.</p>
                </div>

                <div class="capability">
                    <h4>Add inventory</h4>
                    <p>Add inventory to the pharmacy.</p>
                </div>

                
                <div class="capability">
                    <h4>View inventory</h4>
                    <p>View inventory found in the pharmacy system.</p>
                </div>

                
                <div class="capability">
                    <h4>View Contract</h4>
                    <p>View the contracts between pharmacy and pharmaceutical company .</p>
                </div>

                
                <div class="capability">
                    <h4>View drugs</h4>
                    <p>View drugs found the in the system.</p>
                </div>

                
                <div class="capability">
                    <h4>View supervisors</h4>
                    <p>View all the supervisors in the system.</p>
                </div>

                
                <div class="capability">
                    <h4>View pharmaceutical Companies</h4>
                    <p>View all pharmaceutical companies in the system.</p>
                </div>

                
                <div class="capability">
                    <h4>View Pharmacists</h4>
                    <p>View all the pharmacists in the system.</p>
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