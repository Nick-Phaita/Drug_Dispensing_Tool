<?php
require_once("connection.php");

try{
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $name=$_POST["pharname"];
        $address=$_POST["Address"];
        $phone_no=$_POST["phoneno"];
        

       $sql="INSERT INTO Pharmacy (Names,Addresss,Phone_no) 
       VALUES ('$name','$address','$phone_no')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){

    header("Location: pharmacy_register.html");

    echo "<script>alert('Duplicate SSN entered')</script>";

}
?>