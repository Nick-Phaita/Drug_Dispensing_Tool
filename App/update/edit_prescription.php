<?php
require_once("../connection.php");
session_start();


$PrescriptionIDold = $PrescriptionIDnew = "";
$TradeName = "";
$Quantity = "";
$DoctorSSN = "";
$PatientSSN = "";
$Instructions = "";
$PrescriptionDate = "";

 
$PrescriptionIDold = $_GET["PrescriptionID"];
$sql="SELECT * FROM Prescriptions WHERE PrescriptionID='$PrescriptionIDold'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();
 
$PrescriptionIDold = $row['PrescriptionID'];
$TradeName = $row['TradeName'];
$Quantity = $row['Quantity'];
$DoctorSSN = $row['DoctorSSN'];
$PatientSSN = $row['PatientSSN'];
$Instructions = $row['Instructions'];
$PrescriptionDate = $row['PrescriptionDate'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
    $PrescriptionIDnew = $_POST['PrescriptionID'];
    $TradeName = $_POST['TradeName'];
    $Quantity = $_POST['Quantity'];
    $DoctorSSN = $_POST['DoctorSSN'];
    $PatientSSN = $_POST['PatientSSN'];
    $Instructions = $_POST['Instructions'];
    $PrescriptionDate = $_POST['PrescriptionDate'];

    
        

        $sql="UPDATE Prescriptions SET PrescriptionID='$PrescriptionIDnew',TradeName='$TradeName',
        Quantity='$Quantity',DoctorSSN='$DoctorSSN',PatientSSN='$PatientSSN',
        Instructions='$Instructions',PrescriptionDate='$PrescriptionDate' 
        WHERE PrescriptionID='$PrescriptionIDold'";

        $result = mysqli_query($conn, $sql);
        
        if($result){
            header("Location: ../view/view_prescriptions.php");
        }
        
        

    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Prescription</title>
    <script type="text/javascript" src="../scripts.js"></script>
</head>
<body>
    <h1>Edit Prescription</h1>

    <form action="" method="post">
        <label for="PrescriptionID">Prescription ID:</label><br>
        <input type="text" id="PrescriptionID" name="PrescriptionID" value="<?php echo $PrescriptionIDold?>" placeholder="Enter the prescription ID" required><br>
        <label for="TradeName">Drug Trade Name:</label><br>
        <?php 
            $sql = "SELECT TradeName FROM Drugs";
            $result = $conn-> query($sql);
            
        ?>
        <select name="TradeName" id="TradeName">
            <option value="<?php echo $TradeName?>" selected ><?php echo $TradeName?></option>
            <?php
                // use a while loop to fetch data
                // from the $all_categories variable
                // and individually display as an option
                while ($category = mysqli_fetch_array(
                        $result,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $category['TradeName'];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $category['TradeName'];
                        // To show the category name to the user
                    ?>
                </option>
            <?php
                endwhile;
                // While loop must be terminated
            ?>
        </select><br>
        <label for="Quantity">Quantity:</label><br>
        <input type="text" name="Quantity" id="Quantity" value="<?php echo $Quantity?>" placeholder="Enter the quantity" required><br>
        <label for="DoctorSSN">Doctor SSN:</label><br>
        <input type="text" name="DoctorSSN" id="DoctorSSN" value="<?php echo $DoctorSSN?>" required><br>
        <label for="PatientSSN">Patient SSN:</label><br>
        <input type="text" name="PatientSSN" id="PatientSSN" value="<?php echo $PatientSSN?>" placeholder="Enter the patient's SSN" required><br>
        <label for="Instructions">Instructions:</label><br>
        <textarea name="Instructions" id="Instructions" cols="30" rows="10" placeholder="Enter prescriber's instructions"><?php echo $Instructions?></textarea><br>
        <label for="PrescriptionDate">Date:</label><br>
        <input type="date" name="PrescriptionDate" id="PrescriptionDate" value="<?php echo $PrescriptionDate?>" placeholder="Enter the date" required><br><br>
        <input type="submit" value="Submit"><br><br>
        <input type="reset" onclick="return confirm_reset();"><br><br>
        <button onclick="return cancel()">Cancel</button>
    </form>
</body>
</html>