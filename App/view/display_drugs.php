<?php
session_start();
require_once("../connection.php");
$Username = $_SESSION['Username'];



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
    <button class="btn" onclick="show_narcotics()">Narcotics</button>
    <button class="btn" onclick="show_painkiller()">Painkillers</button>
    <button class="btn" onclick="show_anasthetic()">Anasthetics</button>
    <hr>
            <ul class="view_narc"><?php
            $cat="";
            $sql="SELECT * FROM `drugs` WHERE dcategory='Narcotics'";
            $result=$conn->query($sql);
            if($result->num_rows > 0){
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
            <ul class="view_painkillers">
            <?php
            $sql="SELECT * FROM `drugs` WHERE dcategory='Painkillers'";
            $result=$conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if($currentCategory != $row['dcategory']){
                        echo "<h2>".$row['dcategory']."</h2>";
                        $currentCategory = $row['dcategory'];
                    }

                    echo "<li style='display: inline-block'><img src='".$row['folder']."' 
                    alt='".$row['TradeName']."'/><a href='drug_details.php?TradeName=".
                    $row['TradeName']."'><p style='text-align:center'>View Details</p></a></li>";
                 }
             } ?>
            </ul>

            <ul class="view_anasthetic">
            <?php
            $sql="SELECT * FROM `drugs` WHERE dcategory='Anasthetic'";
            $result=$conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if($currentCategory != $row['dcategory']){
                        echo "<h2>".$row['dcategory']."</h2>";
                        $currentCategory = $row['dcategory'];
                    }

                    echo "<li style='display: inline-block'><img src='".$row['folder']."' 
                    alt='".$row['TradeName']."'/><a href='drug_details.php?TradeName=".
                    $row['TradeName']."'><p style='text-align:center'>View Details</p></a></li>";
                 }
             } ?>   
            </ul>
    <br>

    

    <script>
        function show_anasthetic(){
            var x=document.getElementsByClassName("view_narc");
            var y=document.getElementsByClassName("view_painkillers");
            var z=document.getElementsByClassName("view_anasthetic");
            if(z[0].style.display==="none"){
                z[0].style.display="block";
                x[0].style.display="none";
                y[0].style.display="none";
            }
            else{
                x[0].style.display="none";
                y[0].style.display="none";
            } 
        }

        function show_painkiller(){
            var x=document.getElementsByClassName("view_narc");
            var y=document.getElementsByClassName("view_painkillers");
            var z=document.getElementsByClassName("view_anasthetic");
            if(y[0].style.display==="none"){
                y[0].style.display="block";
                x[0].style.display="none";
                z[0].style.display="none";
            }
            else{
                x[0].style.display="none";
                z[0].style.display="none";
            } 
        }

        function show_narcotics(){
            var x=document.getElementsByClassName("view_narc");
            var y=document.getElementsByClassName("view_painkillers");
            var z=document.getElementsByClassName("view_anasthetic");
            if(x[0].style.display==="none"){
                x[0].style.display="block";
                y[0].style.display="none";
                z[0].style.display="none";
            }
            else{
                y[0].style.display="none";
                z[0].style.display="none";
            }
        }
    </script>
        
    </body>
</html>