<?php 
require_once("../connection.php");
session_start();

$SSN = $_SESSION['SSN'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code

$sqlretrieve = "SELECT * FROM Doctors";

$result = $conn->query($sqlretrieve);

if($_SESSION['Usertype']=='pharmacist'){
    echo '<a href="../dashboards/pharmacist_dashboard.php">Back to Dashboard</a>';
}

if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        <h1>Doctors </h1>
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