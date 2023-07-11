<?php 
require_once("../connection.php");
session_start();


$Username = $_SESSION['Username'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code

$sqlretrieve = "";

if($_SESSION['Usertype'] == "supervisor"){
    $title = "All Drugs In Supply";
    $sqlretrieve = "SELECT * FROM Drugs;";
}

if($_SESSION['Usertype'] == "pharmaceuticalcompany"){
    $title = "Company's Drugs";
    $sql = "SELECT * FROM PharmaCo WHERE Username = '$Username'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $CompanyID = $row['CompanyID'];
    $sqlretrieve = "SELECT * FROM Drugs WHERE CompanyID='$CompanyID';";
}

$result = $conn->query($sqlretrieve);

if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        <h1><?php echo $title?> </h1>
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
                    <?php if($_SESSION['Usertype'] == "pharmaceuticalcompany"){ ?>
                    <td><a href='/App/update/edit_drug.php?TradeName=<?php echo $row["TradeName"]?>'>Edit</a></td><?php }?>
                </tr>
            <?php } ?>
        </table>
    <?php }else {
        echo "No results";
        } ?>

    <?php $conn->close();?>
        
    </body>
</html>