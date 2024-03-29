<?php 
session_start();

if (isset( $_SESSION['loggedin'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator Dashboard</title>
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

            <h2>Administrator Dashboard</h2>
            <h2 id="logmsg"><?php echo $_SESSION['sccmmsg'];
            $_SESSION['sccmmsg']="";
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
                    <li><a href="../add/add_pharmacy.php">Add pharmacy</a></li>
                    <li><a href="../signup.html" onclick="return confirm('Are you sure you want to do this? You will be signed out')">Add User</a></li>
                    <li><a href="../view/view_users.php">View Users</a></li>
                    <li><a href="../view/view_api_users.php">View API Users</a></li>
                    <li><a href="../add/add_drug.php">Add Drug</a></li>
                    <li><a href="../view/view_drugs.php">View Drugs</a></li>
                    <li><a href="../add/add_drug_category.php">Add Drug Category</a></li>
                    <li><a href="../view/view_drug_categories.php">View Drug Categories</a></li>
                    <li><a href="../signout.php">Sign Out</a></li>
                    <li><a href="../delete.php" onclick="return confirm('Are you sure you want to delete your account?')">Delete User</a></li>
                </ul>
    
            </div>

        
            <div class="capabilities">
                <h2>Access all functionalities from the sidebar. Hover over each below to see what you can do.</h2>
                <div class="capability">
                    <h4>Edit Profile</h4>
                    <p>Update your user details such as your Username and Password.</p>
                </div>

                <div class="capability">
                    <h4>Add pharmacy</h4>
                    <p>Add Pharmacies to the system</p>
                </div>

                <div class="capability">
                    <h4>View Users</h4>
                    <p>View all users able to access the system</p>
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
    header("Location: /App/login(html).php");
    exit();
}
?>