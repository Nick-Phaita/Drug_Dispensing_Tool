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
    $password = validate($_POST["ppass"]);

    if (empty($SSN)) {
        echo 
        "<script>alert('SSN required')</script>";
	    exit();
	}else if(empty($password)){
        echo 
            "<script>alert('Password required')</script>";
	    exit();
	}else{
        $sql = "SELECT * FROM pharmacist WHERE SSN='$SSN' AND Pharmacistpassword='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['SSN'] === $SSN && $row['Pharmacistpassword'] === $password) {
                $_SESSION['loggedin']=true;
                $_SESSION['Names'] = $row['Names'];
    
                header("Location: home.php");
                exit();
            }else{
    
                echo 
                "<script>alert('Incorrect SSN or password')</script>";
            }
        }else{
    
            $_SESSION['else']="Incorrect SSN or password";
            echo 
            "<script>alert('Incorrect SSN or password')</script>";
    
            header("Location: login_pharmacist.html");
        }

    }
}
?>