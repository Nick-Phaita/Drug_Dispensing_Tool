<?php 
require_once("../connection.php");
session_start();

$SSN = $_SESSION['SSN'];


//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code

$sqlretrieve = "";

if($_SESSION['Usertype'] == "patient"){
    $sqlretrieve = "SELECT * from Prescriptions WHERE PatientSSN='$SSN'";
}
if($_SESSION['Usertype'] == "doctor" || $_SESSION['Usertype'] == "pharmacist"){
    $sqlretrieve = "SELECT * from Prescriptions";
}

$result = $conn->query($sqlretrieve);

if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        <h1>Prescriptions</h1>
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
                    <?php if($_SESSION['Usertype'] == "doctor"){ ?>
                    <td><a href='/App/update/edit_prescription.php?PrescriptionID=<?php echo $row["PrescriptionID"]?>'>Edit</a></td><?php }?>
                </tr>
            <?php } ?>
        </table>
    <?php }else {
        echo "No results";
        } ?>

    <?php $conn->close();?>
        
    </body>
</html>


    
    
    
        
    
    
        
        
            
        
    




