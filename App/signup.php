<?php
require_once("connection.php");
session_start();
try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $usertype = $_POST["usertype"];
        $password = $_POST["password"];

        $sql = "INSERT INTO Users (Username, Password, Usertype) 
        VALUES ('$username', '$password', '$usertype')";
    
        if($conn->query($sql) === TRUE) {
            echo 
            "<script>alert('User $username created successfully')</script>";
            $_SESSION['Username'] = $username;
            if($usertype == "patient"){
            header("Location: registration/registerPatient.php");
            }elseif($usertype == "doctor"){
            header("Location: registration/registerDoctor.php");
            }elseif($usertype == "pharmacist"){
            header("Location: registration/registerPharmacist.php");
            }elseif($usertype == "supervisor"){
            header("Location: registration/register_supervisor.html");
            }elseif($usertype == "pharmaceuticalcompany"){
            header("Location: registration/register_pharmaco.html");
            }
        }else {
        echo "Error: ".$sql."<br>".$conn->error;
        }
    }
}catch(Exception){

    header("Location: signup.html");

    echo "<script>alert('Error')</script>";

}
?>