<?php
require_once("..\connection.php");
$SSN = "";
$Names = "";
$Gender = "";
$Allergies = "";
$HeightinCm = "";
$WeightinKg = "";
$PatientAddress ="";
$DateOfBirth ="";
$UserPassword = "";

 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["SSN"])){
        header("Location: view_doctors.php ");
    }

    $SSN=$_GET["SSN"];

    $sql="SELECT * FROM patients WHERE SSN=$SSN";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: view_doctors.php");
         exit;
    }

    $SSN =$row['SSN'] ;
    $Names = $row["Names"];
    $Gender = $row["Gender"];
    $Allergies =$row["Allergies"];
    $HeightinCm = $row["HeightinCm"];
    $WeightinKg =$row["WeightinKg"];
    $PatientAddress =$row["PatientAddress"];
    $DateOfBirth =$row["DateOfBirth"];
    $UserPassword = $row["UserPassword"];


 }elseif(isset($_POST['SSN'])){
     
    $SSN = $_POST["SSN"];
    $Names = $_POST["Names"];
    $Gender = $_POST["Gender"];
    $Allergies = $_POST["Allergies"];
    $HeightinCm = $_POST["HeightinCm"];
    $WeightinKg = $_POST["WeightinKg"];
    $PatientAddress = $_POST["PatientAddress"];
    $DateOfBirth = $_POST["DateOfBirth"];
    $UserPassword = $_POST["UserPassword"];

    
        if(empty($SSN) || empty($name) || empty($speciality)){
            echo "All fields are required ";
            
        }

        $sql="UPDATE patients SET SSN='$SSN',Names='$Names',
        Gender='$Gender',Allergies='$Allergies',HeightinCm='$HeightinCm',
        WeightinKg='$WeightinKg',PatientAddress='$PatientAddress',DateOfBirth='$DateOfBirth'
        ,UserPassword='$UserPassword' WHERE SSN=$SSN";

        $result = mysqli_query($conn, $sql);

        header('Location: /adminpage.php');

    

    
    } 
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>

    </head>
    <body>
        <h1>Edit patients</h1>
        <form method="post" action="">
            <label for="SSN">Social Security Number:</label><br>
            <input type="text" id="SSN" name="SSN" required placeholder="Enter your SSN" value="<?php echo $SSN?>"><br>
            <label for="Names">Name: </label><br>
            <input type="text" id="Names" name="Names" required placeholder="Enter your name here" value="<?php echo $Names?>"><br>
            <label for="Gender">Gender:</label><br>
            <select name="Gender" id="Gender" required>
                <option value="<?php echo $Gender?>" selected hidden><?php echo $Gender?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Non-binary">Non-binary</option>
            </select><br>
            <label for="Allergies">Allergies:</label><br>
            <input type="text" name="Allergies" id="Allergies" cols="20" rows="10" value="<?php echo $Allergies?>"></input><br>
            <label for="HeightinCm">Height (in centimetres):</label><br>
            <input type="text" id="HeightinCm" name="HeightinCm" placeholder="Enter your height" required value="<?php echo $HeightinCm?>"><br>
            <label for="WeightinKg">Weight (in kilograms):</label><br>
            <input type="text" id="WeightinKg" name="WeightinKg" placeholder="Enter your weight" required value="<?php echo $WeightinKg?>"><br>
            <label for="PatientAddress">Address:</label><br>
            <input type="text" name="PatientAddress" id="PatientAddress" required placeholder="Enter your address" value="<?php echo $PatientAddress?>"><br>
            <label for="DateOfBirth">Date of birth: </label><br>
            <input type="date" name="DateOfBirth" id="DateOfBirth" required value="<?php echo $DateOfBirth?>"><br>
            <label for="UserPassword">Password: </label><br>
            <input type="password" name="UserPassword" id="UserPassword" required placeholder="*****" value="<?php echo $UserPassword?>"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body> 
</html>