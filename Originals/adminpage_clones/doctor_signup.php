<?php
require_once("../connection.php");

try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $SSN=$_POST["SSN"];
        $name=$_POST["nname"];
        $speciality=$_POST["spec"];
        $years=$_POST["years"];
        $password=$_POST["docpassword"];

       $sql="INSERT INTO Doctors (SSN,Names,Speciality,Years_Of_experience,Doctorpassword) 
       VALUES ('$SSN','$name','$speciality','$years','$password')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";

    header("Location: /adminpage.php");
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){

    header("Location: doctor_signup.html");

    echo "<script>alert('Duplicate SSN entered')</script>";

}


?>