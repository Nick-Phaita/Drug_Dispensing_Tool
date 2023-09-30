<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <img src="" alt="">
        <table>
            <tr>
                <th>SSN
                </th>
                <th>TradeName</th>
                <th>Formula</th>
                <th>dcategory</th>
                <th>folder</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            session_start();
            require_once("../connection.php");

            $sql="SELECT * FROM `drugs`";
            
            $result=$conn->query($sql);

            if($result=$conn->query($sql)){

                while($row = $result->fetch_assoc()){
            
            echo "
            <tr><td>$row[TradeName]</td>
            <td>$row[Formula]</td>
            <td>$row[CompanyID]</td>
            <td>$row[dcategory]</td>
            <td><img src='$row[folder]' alt=''></td>
            ";

                }
            }
            ?>
        </table>
    </body>
</html>