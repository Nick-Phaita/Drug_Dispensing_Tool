<?php
require_once("../connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["SSN"])){
    $PatientSSN = $_GET["SSN"];
}else{
    $PatientSSN = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <!--<link rel="stylesheet" type="text/css" href="../styles/form.css">-->
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
                        <h1>Make Prescription</h1>
             </div>
    
            <div class="right-container">
                <form action="" method="post">
                    <div class="field">
                    <label for="PrescriptionID">Prescription ID:</label><br>
                    <input type="text" id="PrescriptionID" name="PrescriptionID" placeholder="Enter the prescription ID" required><br>
                    </div>

                    <div class="field">
                    <label for="TradeName">Drug Trade Name:</label><br>
                    <?php 
                        $sql = "SELECT TradeName FROM Drugs";
                        $result = $conn-> query($sql);
                        
                    ?>
                    <select name="TradeName" id="TradeName">
                        <option value="" selected hidden>Select the drug</option>
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
                    <input type="text" name="Quantity" id="Quantity" placeholder="Enter the quantity" required><br>
                    </div>

                    <div class="field">
                    <label for="DoctorSSN">Doctor SSN:</label><br>
                    <input type="text" name="DoctorSSN" id="DoctorSSN" value="<?php echo $_SESSION['SSN']?>" readonly required><br>
                    </div>

                    <div class="field">
                    <label for="PatientSSN">Patient SSN:</label><br>
                    <input type="text" name="PatientSSN" id="PatientSSN" value="<?php echo $PatientSSN?>" placeholder="Enter the patient's SSN" required><br>
                    </div>

                    <div class="field">
                    <label for="PrescriptionDate">Date:</label><br>
                    <input type="date" name="PrescriptionDate" id="PrescriptionDate" placeholder="Enter the date" required><br>
                    </div>

                    <div class="field-txtarea">
                    <label for="Instructions">Instructions:</label><br>
                    <textarea name="Instructions" id="Instructions" cols="30" rows="10" placeholder="Enter prescriber's instructions"></textarea><br>
                    </div>



                    <br>
                    <input class="button" type="submit" value="Submit">
                    <input class="button" type="reset" onclick="return confirm_reset();">
                    <input class="button" type="button" onclick="return cancel()" value="Cancel">
                </form>
            </div>

    </div>
</body>
</html>

<?php


try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $PrescriptionID = $_POST["PrescriptionID"];
        $TradeName = $_POST["TradeName"];
        $Quantity = $_POST["Quantity"];
        $DoctorSSN = $_POST["DoctorSSN"];
        $PatientSSN = $_POST["PatientSSN"];
        $Instructions = $_POST["Instructions"];
        $PrescriptionDate = $_POST["PrescriptionDate"];
        

       $sql="INSERT INTO Prescriptions (PrescriptionID, TradeName, Quantity, DoctorSSN, PatientSSN, Instructions, PrescriptionDate) 
       VALUES ('$PrescriptionID', '$TradeName', '$Quantity', $DoctorSSN, $PatientSSN, '$Instructions', '$PrescriptionDate')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
    
    header("Location: ../dashboards/doctor_dashboard.php");

}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){
    echo "<script>alert('Duplicate SSN entered')</script>";

}
?>