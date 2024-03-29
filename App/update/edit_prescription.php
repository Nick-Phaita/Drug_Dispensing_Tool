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
    <link rel="stylesheet" type="text/css" href="../styles/form.css">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
    <div class="form">
        <div class="left-container">
            <div class="icon">
            <h2 class="logo">Dispenzer</h2>
        </div>
            <h1>Edit Prescription</h1>
        </div>
            <div class="right-container">
                <form action="" method="post">
                    <div class="field">
                    <label for="PrescriptionID">Prescription ID:</label><br>
                    <input type="text" id="PrescriptionID" name="PrescriptionID" value="<?php echo $PrescriptionIDold?>" placeholder="Enter the prescription ID" required><br>
                    </div>

                    <div class="field">
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
                    </div>

                    <div class="field">
                    <label for="Quantity">Quantity:</label><br>
                    <input type="text" name="Quantity" id="Quantity" value="<?php echo $Quantity?>" placeholder="Enter the quantity" required><br>
                    </div>

                    <div class="field">
                    <label for="DoctorSSN">Doctor SSN:</label><br>
                    <input type="text" name="DoctorSSN" id="DoctorSSN" value="<?php echo $DoctorSSN?>" readonly required><br>
                    </div>

                    <div class="field">
                    <label for="PatientSSN">Patient SSN:</label><br>
                    <input type="text" name="PatientSSN" id="PatientSSN" value="<?php echo $PatientSSN?>" placeholder="Enter the patient's SSN" required><br>
                    </div>

                    <div class="field">
                    <label for="PrescriptionDate">Date:</label><br>
                    <input type="date" name="PrescriptionDate" id="PrescriptionDate" value="<?php echo $PrescriptionDate?>" placeholder="Enter the date" required><br>
                    </div>

                    <div class="field-txtarea">
                    <label for="Instructions">Instructions:</label><br>
                    <textarea name="Instructions" id="Instructions" cols="30" rows="10" placeholder="Enter prescriber's instructions"><?php echo $Instructions?></textarea><br>
                    </div>


                    <br>

                    <input class="button" type="submit" value="Submit">
                    <input class="button" type="reset" onclick="return confirm_reset();">
                    <input class="button" type="button" onclick="return cancel()" value="Cancel" >
                </form>
            </div>
    </div>
</body>
</html>