<?php
require_once("connection.php");
 $SSN="";
 $name="";
 $speciality="";
 $years="";
 $password="";

 if($_SERVER['REQUEST METHOD'] == 'GET'){

    if(!isset($_GET["SSN"])){
        header("Location: view_doctors.php ");
    }

    $SSN=$_GET["SSN"];

    $sql="SELECT * FROM doctors WHERE SSN=$SSN";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: view_doctors.php");
         exit;
    }

    $SSN=$row["SSN"];
 $name=$row["Names"];
 $speciality=$row["Speciality"];
 $years=$row["Years_of_experience"];
 $password=$row["Doctorpassword"];


 }else{
     
    $SSN=$_POST["SSN"];
    $name=$_POST["nname"];
    $speciality=$_POST["spec"];
    $years=$_POST["years"];
    $password=$_POST["docpassword"];

    do{
        if(empty($SSN) || empty($name) || empty($speciality)){
            echo "All fields are required ";
            break;

        }

        $sql="UPDATE doctors SET SSN='$SSN',Names='$name',Speciality='$speciality',`Years_of_experience`='$years',`Doctorpassword`='$password' WHERE SSN=$SSN";

        $result = mysqli_query($conn, $sql);
    }while(true);

    
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Doctors sign-up</h1>
    <form action="/project-drug-dispenser/Drug_Dispensing_Tool/doctor_signup.php" method="post">
        <label for="SSN">Social Security Number:</label>
        <input type="text" id="SSN" name="SSN" required placeholder="Enter your SSN" value="<?php echo $SSN?>"><br><br>
        <label for="nname">Name</label>
        <input type="text" name="nname" id="nname" required placeholder="Enter your name" value="<?php echo $name?>"><br><br>
        <label for="speciality">speciality</label>
        <select name="spec" id="speciality" required value="<?php echo $speciality?>">
            <option value="" selected hidden>Pick the speciality</option>
            <option value="dentist">dentist</option>
            <option value="opthalmologist">opthalmologist</option>
            <option value="gaenacologist">gaenacologist</option>
            <option value="psycologist">psycologist</option>
        </select><br><br>
        <label for="yoe">Years of experience</label>
        <input type="number" id="yoe" name="years" required placeholder="Enter years" value="<?php echo $years?>"><br><br>
        <label for="UserPassword">Password: </label>
        <input type="password" name="docpassword" id="UserPassword" required placeholder="*****" value="<?php echo $password?>"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>