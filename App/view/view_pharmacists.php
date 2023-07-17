<?php 
require_once("../connection.php");
session_start();

$SSN = $_SESSION['SSN'];
$Username = $_SESSION['Username'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code


if($_SESSION['Usertype'] == "supervisor"){
    $sql = "SELECT * FROM Supervisor WHERE SSN = '$SSN'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $PharmacyID = $row['PharmacyID'];
    $sqlretrieve = "SELECT * FROM Pharmacist WHERE PharmacyID = '$PharmacyID'";
}


$result = $conn->query($sqlretrieve);

echo '<script type="text/javascript" src="../scripts.js"></script>';
echo '<button onclick="back()">Back to Dashboard</button>';

if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        <h1>View Pharmacists </h1>
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
        echo "<br>No results";
        } ?>

    <?php $conn->close();?>
        
    </body>
</html>