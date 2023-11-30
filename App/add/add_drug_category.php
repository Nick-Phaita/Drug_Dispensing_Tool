<?php
require_once("../connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Categories</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
        <!--<link rel="stylesheet" type="text/css" href="../styles/form.css">-->
        <script type="text/javascript" src="../scripts.js"></script>
        <link rel="stylesheet" type="text/css" href="../styles/form.css">
        <link rel="stylesheet" type="text/css" href="../styles/style.css">
</head>
<body>
    <div class="form">
    <div class="left-container">
                                <div class="icon">
                                    <h2 class="logo">Dispenzer</h2>
                                </div>
                                <h1>Add Drug Category</h1>
                    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="field">
        <label for="cid">Category ID:</label><br>
        <input type="text" id="cid" name="cid" placeholder="Enter the category ID" required><br>
        </div>

        <div class="field">
        <label for="cname">Category Name:</label><br>
        <input type="text" id="cname" name="cname" placeholder="Enter the category name" required><br>
        </div>

        <div class="field-txtarea">
            <label for="cdescription">Description:</label><br>
            <textarea name="cdescription" id="cdescription" cols="30" rows="10" placeholder="Enter description"></textarea><br>
        </div>

        <input class="button"type="submit" value="Submit">
        <input class="button"type="reset" onclick="return confirm_reset();">
        <input class="button" type="button" onclick="return cancel()" value="Cancel">
    </form>
    </div>
</body>
</html>

<?php
//require_once("../connection.php");

try{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cID = $_POST["cid"];
        $cName = $_POST["cname"];
        $cDescription = $_POST["cdescription"];

       $sql="INSERT INTO dcategory (cid, cname, cdescription) 
       VALUES ('$cID', '$cName', '$cDescription')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
    
    header("Location: ../dashboards/admin_dashboard.php");

}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){
    echo "<script>alert('Duplicate SSN entered')</script>";

}
?>