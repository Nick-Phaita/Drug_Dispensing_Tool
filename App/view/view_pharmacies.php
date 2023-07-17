<?php 
require_once("../connection.php");
session_start();


$Username = $_SESSION['Username'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code



if($_SESSION['Usertype'] == "pharmaceuticalcompany"){
    $sqlretrieve = "SELECT * FROM Pharmacy  ";
}

$result = $conn->query($sqlretrieve);

if($_SESSION['Usertype']=='pharmaceuticalcompany'){
    echo '<a href="../dashboards/pharmaco_dashboard.php">Back to Dashboard</a>';
}

if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        <h1>View Pharmacies </h1>
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