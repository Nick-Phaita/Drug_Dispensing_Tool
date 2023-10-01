<?php
require_once("../connection.php");
session_start();


if(isset($_GET['TradeName'])){
    $TradeName = $_GET['TradeName'];
}

echo '<a class="back-to-dash" href="../view/display_drugs.php">Back to Drug Details</a>';

$sql = "SELECT * from `drugs` WHERE TradeName = '$TradeName'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Drug Details</title>
        <link rel="stylesheet" href="../styles/view1.css">
        <link rel="stylesheet" href="../styles/style.css">
    </head>
    <body>
        <div>
            <span>
                <img class="img" src="<?php echo $row['folder'];?>" alt="<?php echo $row['TradeName']; ?>">
            </span>
        </div>
        <div>
            <h2><?php echo $row['TradeName'];?></h2>
            <table>
                <tr>
                    <th>Formula:</th>
                    <td><?php echo $row['Formula']; ?></td>
                </tr>
                <tr>
                    <th>Company ID:</th>
                    <td><?php echo $row['CompanyID']; ?></td>
                </tr>
                <tr>
                    <th>Category:</th>
                    <td><?php echo $row['dcategory']; ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>