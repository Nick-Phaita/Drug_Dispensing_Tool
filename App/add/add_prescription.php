<?php
require_once("../connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <script type="text/javascript" src="../scripts.js"></script>
</head>
<body>
    <h1>Make Prescription</h1>

    <form action="" method="post">
        <label for="PrescriptionID">Prescription ID:</label><br>
        <input type="text" id="PrescriptionID" name="PrescriptionID" placeholder="Enter the prescription ID" required><br>
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
        <label for="Quantity">Quantity:</label><br>
        <input type="text" name="Quantity" id="Quantity" placeholder="Enter the quantity" required><br>
        <label for="DoctorSSN">Doctor SSN:</label><br>
        <input type="text" name="DoctorSSN" id="DoctorSSN" value="<?php echo $_SESSION['SSN']?>" required><br>
        <label for="PatientSSN">Patient SSN:</label><br>
        <input type="text" name="PatientSSN" id="PatientSSN" placeholder="Enter the patient's SSN" required><br>
        <label for="Instructions">Instructions:</label><br>
        <textarea name="Instructions" id="Instructions" cols="30" rows="10" placeholder="Enter prescriber's instructions"></textarea><br>
        <label for="PrescriptionDate">Date:</label><br>
        <input type="date" name="PrescriptionDate" id="PrescriptionDate" placeholder="Enter the date" required><br><br>
        <input type="submit" value="Submit"><br><br>
        <input type="reset" onclick="return confirm_reset();"><br><br>
        <button onclick="return cancel()">Cancel</button>
    </form>
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