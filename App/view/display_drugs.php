<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <?php
        session_start();
        require_once("../connection.php");

        $sql="SELECT * FROM `drugs`";
            
        $result=$conn->query($sql);

        $currentCategory = null;

        if($result->num_rows > 0){?>
            <ul><?php
                while($row = $result->fetch_assoc()){
                    if($currentCategory != $row['dcategory']){
                        echo "<h2>".$row['dcategory']."</h2>";
                        $currentCategory = $row['dcategory'];
                    }

                    echo "<li style='display: inline-block'><img src='".$row['folder']."' alt='".$row['TradeName']."'/><a href='drug_details.php?TradeName=".$row['TradeName']."'><p style='text-align:center'>View Details</p></a></li>";

                    
                    
                    
            

                 }
        }
    ?>      </ul>
        
    </body>
</html>