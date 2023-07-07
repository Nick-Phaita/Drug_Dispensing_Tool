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
        if ($row['Username'] === $username && $row['Password'] === $password) {
            $_SESSION['loggedin']=true;
            //$_SESSION['Names'] = $row['Names'];

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