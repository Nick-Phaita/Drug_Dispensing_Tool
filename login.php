<?php
require_once("connection.php");
session_start();
if(isset($_POST["submit"])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    $SSN = validate($_POST["SSN"]);
    $password = validate($_POST["passw"]);

    if (empty($SSN)) {
        echo 
        "<script>alert('SSN required')</script>";
	    exit();
	}else if(empty($password)){
        echo 
            "<script>alert('Password required')</script>";
	    exit();
	}else{
    $sql = "SELECT * FROM Patients WHERE SSN='$SSN' AND UserPassword='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['SSN'] === $SSN && $row['UserPassword'] === $password) {
            $_SESSION['Names'] = $row['Names'];

            header("Location: home.php");
            exit();
        }else{
            echo 
            "<script>alert('Incorrect SSN or password')</script>";
        }
    }else{
        echo 
        "<script>alert('Incorrect SSN or password')</script>";
    }
}
}

?>