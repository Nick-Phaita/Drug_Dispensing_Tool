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
                <h1><?php echo $_SESSION['Names'] ; ?></h1>
                <h3>Hello, <?php echo $_SESSION['Username']?></h3>
            </div>

            <h2>Pharmaceutical Company Dashboard</h2>
        </div>

        <hr>

        <div class="main">

            <div class="links-bar">
                <ul>
                    <li><a href="../update/edit_user.php">Edit Profile</a></li>
                    <li><a href="../update/edit_patient.php">Edit Details</a></li>
                    <li><a href="../add/add_contract.php">Sign Contract</a></li>
                    <li><a href="../view/view_contracts.php">View Contracts</a></li>
                    <li><a href="../add/add_drug.php">Add Drug</a></li>
                    <li><a href="../view/view_drugs.php">View Drugs</a></li>
                    <li><a href="../view/view_pharmacies.php">View Pharmacies</a></li>
                    <li><a href="../view/view_supervisors.php">View Supervisors</a></li>
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
                    <h4>Edit  Details</h4>
                    <p>Update your Pharmaceutical company details.</p>
                </div>

                <div class="capability">
                    <h4>Sign Contract</h4>
                    <p>Establish contract between pharmacy and pharmaceutical company.</p>
                </div>

                <div class="capability">
                    <h4>View Contract</h4>
                    <p>View all established Contracts.</p>
                </div>

                <div class="capability">
                    <h4>Add Drug</h4>
                    <p>Add a drug to the system.</p>
                </div>

                <div class="capability">
                    <h4>View Drugs</h4>
                    <p>View all drugs recorded in the system.</p>
                </div>

                <div class="capability">
                    <h4>View Pharmacy</h4>
                    <p>View all pharmacy found in the system.</p>
                </div>

                <div class="capability">
                    <h4>View Supervisor</h4>
                    <p>View all Supervisor in the system.</p>
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