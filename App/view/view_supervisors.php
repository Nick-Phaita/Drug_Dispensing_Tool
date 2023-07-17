<?php 
require_once("../connection.php");
session_start();


$Username = $_SESSION['Username'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code


if($_SESSION['Usertype'] == "supervisor"){
    $SSN = $_SESSION['SSN'];
    $sql = "SELECT * FROM Supervisor WHERE SSN = '$SSN'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $PharmacyID = $row['PharmacyID'];
    $sqlretrieve = "SELECT * FROM Supervisor WHERE PharmacyID = '$PharmacyID'";
}
if($_SESSION['Usertype'] == "pharmaceuticalcompany"){
    $sql = "SELECT * FROM PharmaCo WHERE Username = '$Username'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $CompanyID = $row['CompanyID'];
    $sqlretrieve = "SELECT * FROM Supervisor WHERE SSN IN (SELECT SupervisorSSN FROM Contracts WHERE CompanyID = '$CompanyID') ";
}

$result = $conn->query($sqlretrieve);

if($_SESSION['Usertype']=='supervisor'){
    echo '<a href="../dashboards/supervisor_dashboard.php">Back to Dashboard</a>';
}elseif($_SESSION['Usertype']=='pharmaceuticalcompany'){
    echo '<a href="../dashboards/pharmaco_dashboard.php">Back to Dashboard</a>';
}


if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        <h1>View Supervisors </h1>
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