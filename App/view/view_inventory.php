<?php 
require_once("../connection.php");
session_start();

$SSN = $_SESSION['SSN'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code

$sqlretrieve = "";

if($_SESSION['Usertype'] == "doctor"){
    $title = "Available Drugs";
    $sqlretrieve = "SELECT TradeName,Price, PharmacyName, PharmacyAddress, PhoneNo FROM (inventory NATURAL JOIN pharmacy);";
}

if($_SESSION['Usertype'] == "pharmacist"){
    $title = "Pharmacy Inventory";
    $sql = "SELECT * FROM Pharmacist WHERE SSN = '$SSN'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $PharmacyID = $row['PharmacyID'];
    $sqlretrieve = "SELECT * FROM inventory WHERE PharmacyID='$PharmacyID';";
}

if($_SESSION['Usertype'] == "supervisor"){
    $title = "Pharmacy Inventory";
    $sql = "SELECT * FROM Supervisor WHERE SSN = '$SSN'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $PharmacyID = $row['PharmacyID'];
    $sqlretrieve = "SELECT * FROM inventory WHERE PharmacyID='$PharmacyID';";
}

$result = $conn->query($sqlretrieve);

if($_SESSION['Usertype']=='supervisor'){
    echo '<a href="../dashboards/supervisor_dashboard.php">Back to Dashboard</a>';
}elseif($_SESSION['Usertype']=='doctor'){
    echo '<a href="../dashboards/doctor_dashboard.php">Back to Dashboard</a>';
}elseif($_SESSION['Usertype']=='pharmacist'){
    echo '<a href="../dashboards/pharmacist_dashboard.php">Back to Dashboard</a>';
}


if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        <h1><?php echo $title?> </h1>
        <input type="text" onkeyup="searchTable()" class="search-input" placeholder="Search...">
        <table style='border:1px solid black' class='table-view'>
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
                    <?php if($_SESSION['Usertype'] == "supervisor"){ ?>
                        <td><a href='/App/update/edit_inventory.php?PharmacyID=<?php echo $row["PharmacyID"]?>'>Edit</a></td><?php }?>
                </tr>
            <?php } ?>
        </table>
    <?php }else {
        echo "<br>No results";
        } ?>

    <?php $conn->close();?>

    <script type="text/javascript" src="../scripts.js"></script>
        
    </body>
</html>