<?php
require_once("connection.php");

try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $SSN=$_POST["SSN"];
        $name=$_POST["name"];
        $speciality=$_POST["spec"];
        $years=$_POST["years"];
        $password=$_POST["docpassword"]

        $sql="INSERT INTO"


    }
}catch(Exception){
    echo "<script>alert('Duplicate SSN entered')</script>";
}

?>