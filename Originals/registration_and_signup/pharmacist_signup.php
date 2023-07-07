<?php
require_once("..\connection.php");

try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $SSN=$_POST["pSSN"];
        $name=$_POST["phname"];
        $pharmacy_name=$_POST["pname"];
        $password=$_POST["ppassword"];

       $sql="INSERT INTO Pharmacist (SSN,Names,Pharmacy_name,Pharmacistpassword) 
       VALUES ('$SSN','$name','$pharmacy_name','$password')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";

    
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){

    header("Location: pharmacist_signup.html");

    echo "<script>alert('Duplicate SSN entered')</script>";

}
?>