<?php
require_once("..\connection.php");
session_start();
$usernameOld = $usernameNew = "";
$usertype = "";
$password = "";

$usernameOld = $_SESSION["Username"];

$sql = "SELECT * FROM Users WHERE Username = '$usernameOld'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();
 
$usernameOld=$row['Username'] ;
$usertype = $row["Usertype"];
$password = $row["Password"];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usernameNew =$_POST['Username'] ;
    $usertype = $_POST["Usertype"];
    $password = $_POST["Password"];

    

    if($usertype == "supervisor"){
        $sql="UPDATE Users SET Username='$usernameNew',Usertype='$usertype',
        Password='$password' WHERE Username='$usernameOld'";
        $result1 = mysqli_query($conn, $sql);
        $_SESSION['Username'] = $usernameNew;
        header("Location: ../dashboards/supervisor_dashboard.php");
    }
    if($usertype == "patient"){
        $sql="UPDATE Users SET Username='$usernameNew',Usertype='$usertype',
        Password='$password' WHERE Username='$usernameOld'";
        $result1 = mysqli_query($conn, $sql);
        $_SESSION['Username'] = $usernameNew;
        header("Location: ../dashboards/patient_dashboard.php");
    }
    if($usertype == "doctor"){
        $sql="UPDATE Users SET Username='$usernameNew',Usertype='$usertype',
        Password='$password' WHERE Username='$usernameOld'";
        $result1 = mysqli_query($conn, $sql);
        $_SESSION['Username'] = $usernameNew;
        header("Location: ../dashboards/doctor_dashboard.php");
    }
    if($usertype == "pharmacist"){
        $sql="UPDATE Users SET Username='$usernameNew',Usertype='$usertype',
        Password='$password' WHERE Username='$usernameOld'";
        $result1 = mysqli_query($conn, $sql);
        $_SESSION['Username'] = $usernameNew;
        header("Location: ../dashboards/pharmacist_dashboard.php");
    }
    if($usertype == "pharmaceuticalcompany"){
        $sql="UPDATE Users SET Username='$usernameNew',Usertype='$usertype',
        Password='$password' WHERE Username='$usernameOld'";
        $result1 = mysqli_query($conn, $sql);
        $_SESSION['Username'] = $usernameNew;
        header("Location: ../dashboards/pharmaco_dashboard.php");
    }
    
    

}

        
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>

    </head>
    <body>
        <h1>Edit Account</h1>
        <form method="post" action="">
            <label for="Username">Username</label>
            <input type="text" name="Username" id="Username" value = "<?php echo $usernameOld;?>" required><br><br>
            <label for="Usertype">User Type</label>
            <select name="Usertype" id="Usertype">
                <option value="<?php echo $usertype;?>" selected><?php echo $usertype;?></option>
                <option value="patient">Patient</option>
                <option value="doctor">Doctor</option>
                <option value="pharmacist">Pharmacist</option>
                <option value="supervisor">Supervisor</option>
                <option value="pharmaceuticalcompany">Pharmaceutical Company</option>
            </select> <br><br>
            <label for="Password">Password</label>
            <input type="password" name="Password" id="Password" value = "<?php echo $password;?>" required> <br>
            <button type="submit" name="submit">Confirm</button>
        </form>
    </body> 
</html>