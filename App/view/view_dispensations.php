<?php 
require_once("../connection.php");
session_start();

$SSN = $_SESSION['SSN'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code


if($_SESSION['Usertype'] == "patient"){
    $title = "Collected Prescriptions";
    $sqlretrieve = "SELECT * from Dispensations WHERE PrescriptionID in (SELECT PrescriptionID from Prescriptions WHERE PatientSSN='$SSN')";
}
if($_SESSION['Usertype'] == "pharmacist"){
    $title = "Pharmacy Dispensations";
    $sql = "SELECT * FROM Pharmacist WHERE SSN = '$SSN'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $PharmacyID = $row['PharmacyID'];
    $sqlretrieve = "SELECT * from Dispensations WHERE PharmacistSSN in (SELECT SSN from Pharmacist WHERE PharmacyID='$PharmacyID')";
}

$result = $conn->query($sqlretrieve);

if($_SESSION['Usertype']=='pharmacist'){
    echo '<a href="../dashboards/pharmacist_dashboard.php">Back to Dashboard</a>';
}elseif($_SESSION['Usertype']=='patient'){
    echo '<a href="../dashboards/patient_dashboard.php">Back to Dashboard</a>';
}



if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        
        <h1><?php echo $title?></h1>
        <table style='border:1px solid black' id='prescriptionsTable'>
            <?php $attributes = $result->fetch_fields(); ?>
            <tr style='border:1px solid black'>
                <?php foreach($attributes as $field){?>
                <th style='border:1px solid black'><?php echo $field->name ?></th>
                 <?php } ?> 
            </tr>
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <?php foreach($row as $data){ ?>
                    <td style='border:1px solid black'><?php echo $data ?></td>
                    <?php } ?> 
                    <?php if($_SESSION['Usertype'] == "pharmacist"){ ?>
                        <td><a href='/App/update/edit_dispensation.php?DispensationID=<?php echo $row["DispensationID"]?>'>Edit</a></td><?php }?>
                </tr>
            <?php } ?>
        </table>
    <?php }else {
        echo "<br>No results";
        } ?>

    <?php $conn->close();?>
        
    </body>
</html>