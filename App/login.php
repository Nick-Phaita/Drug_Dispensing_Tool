<?php 
require_once("connection.php");
session_start();
//should clear all previous session data *to be done
if(isset($_POST["submit"])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    $username = validate($_POST["username"]);
    $password = validate($_POST["password"]);

    if (empty($username)) {
        echo 
        "<script>alert('Username required')</script>";
	    exit();
	}else if(empty($password)){
        echo 
            "<script>alert('Password required')</script>";
	    exit();
	}else{
    $sql = "SELECT * FROM Users WHERE Username='$username' AND Password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['Usertype'] = $row['Usertype'];
        if ($row['Username'] === $username && $row['Password'] === $password) {
            $usertype = $row['Usertype'];
            $_SESSION['loggedin']=true;
            if($usertype == "patient"){
                $sql = "SELECT * FROM Patients WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Names'] = $row['Names'];
                $_SESSION['SSN'] = $row['SSN'];
                $_SESSION['Username'] = $row['Username'];
                header("Location: dashboards/patient_dashboard.php");
            }
            if($usertype == "doctor"){
                $sql = "SELECT * FROM Doctors WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Names'] = $row['Names'];
                $_SESSION['SSN'] = $row['SSN'];
                $_SESSION['Username'] = $row['Username'];
                header("Location: dashboards/doctor_dashboard.php");
            }
            if($usertype == "pharmacist"){
                $sql = "SELECT * FROM Pharmacist WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Names'] = $row['Names'];
                $_SESSION['SSN'] = $row['SSN'];
                $_SESSION['Username'] = $row['Username'];
                header("Location: dashboards/pharmacist_dashboard.php");
            }
            if($usertype == "supervisor"){
                $sql = "SELECT * FROM Supervisor WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Names'] = $row['Names'];
                $_SESSION['SSN'] = $row['SSN'];
                $_SESSION['Username'] = $row['Username'];
                header("Location: dashboards/supervisor_dashboard.php");
            }
            if($usertype == "pharmaceuticalcompany"){
                $sql = "SELECT * FROM PharmaCo WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Names'] = $row['CompanyName'];
                $_SESSION['Username'] = $row['Username'];
                header("Location: dashboards/pharmaco_dashboard.php");
            }
            if($usertype == "admin"){
                $sql = "SELECT * FROM Users WHERE Username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['Username'] = $row['Username'];
                header("Location: dashboards/admin_dashboard.php");
            }

            //header("Location: home.php");
            //exit();
        }else{
            /*echo 
            "<script>alert('Incorrect SSN or password')</script>";*/
            header("Location: login.html?error=Incorrect username or password");
            exit();
            
        }
    }else{
        header("Location: login.html?error=Incorrect username or password");
        exit();
        
        
    }
}
}

?>