<?php 
require_once("../connection.php");
session_start();

$Username = $_SESSION['Username'];


//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code


if($_SESSION['Usertype'] == "supervisor"){
    $SSN = $_SESSION['SSN'];
    $title = "View Contract";
    $sqlretrieve = "SELECT * from Contracts WHERE SupervisorSSN = '$SSN'";
}

if($_SESSION['Usertype'] == "pharmaceuticalcompany"){
    $title = "View Contracts";
    $sql = "SELECT * FROM PharmaCo WHERE Username = '$Username'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $CompanyID = $row['CompanyID'];
    $sqlretrieve = "SELECT * from Contracts WHERE CompanyID = '$CompanyID'";
}


$result = $conn->query($sqlretrieve);

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
                    <?php if($_SESSION['Usertype'] == "pharmaceuticalcompany"){ ?>
                        <td><a href='/App/update/edit_contract.php?ContractID=<?php echo $row["ContractID"]?>'>Edit</a></td><?php }?>
                </tr>
            <?php } ?>
        </table>
    <?php }else {
        echo "No results";
        } ?>

    <?php $conn->close();?>
        
    </body>
</html>