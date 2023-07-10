<?php 
require_once("../connection.php");
session_start();

$SSN = $_SESSION['SSN'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code

$sqlretrieve = "";

if($_SESSION['Usertype'] == "doctor"){
    $sqlretrieve = "SELECT TradeName,Price, PharmacyName, PharmacyAddress, PhoneNo FROM (inventory NATURAL JOIN pharmacy);";
}

if($_SESSION['Usertype'] == "pharmacist"){
    $sql = "SELECT * FROM Pharmacist WHERE SSN = '$SSN'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $PharmacyID = $row['PharmacyID'];
    $sqlretrieve = "SELECT * FROM inventory WHERE PharmacyID='$PharmacyID';";
}

$result = $conn->query($sqlretrieve);

if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        <h1>Available Drugs </h1>
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
                </tr>
            <?php } ?>
        </table>
    <?php }else {
        echo "No results";
        } ?>

    <?php $conn->close();?>
        
    </body>
</html>