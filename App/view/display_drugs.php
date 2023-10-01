<?php
session_start();
require_once("../connection.php");
$Username = $_SESSION['Username'];

$sql="SELECT * FROM `drugs`";
            
$result=$conn->query($sql);

$currentCategory = null;

if($_SESSION['Usertype']== 'supervisor'){
    echo '<a class="back-to-dash" href="../dashboards/supervisor_dashboard.php">Back to Dashboard</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drugs</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/view.css">
</head>
<body>
    <h1>Drug Categories</h1>
    <hr>
    <?php
        

        if($result->num_rows > 0){?>
            <ul><?php
                while($row = $result->fetch_assoc()){
                    if($currentCategory != $row['dcategory']){
                        echo "<h2>".$row['dcategory']."</h2>";
                        $currentCategory = $row['dcategory'];
                    }

                    echo "<li style='display: inline-block'><img src='".$row['folder']."' 
                    alt='".$row['TradeName']."'/><a href='drug_details.php?TradeName=".
                    $row['TradeName']."'><p style='text-align:center'>View Details</p></a></li>";

                    
                    
                    
            

                 }
        }
    ?>      </ul>
        
    </body>
</html>