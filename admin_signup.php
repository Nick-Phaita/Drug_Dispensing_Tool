<?php
require_once("connection.php");

try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $SSN=$_POST["aSSN"];
        $Apass=$_POST["apass"];

        $sql="INSERT INTO admin_drug(Names , Apassword) VALUES ('$SSN','$Apass')";

        if($conn->query($sql) === TRUE) {
            echo 
            "<script>alert('Data inserted successfully')</script>";
        }else {
            echo "Error: ".$sql."<br>".$conn->error;
        }


    }
}catch(Exception){
    header("Location: admin_signup.html");
}
?>