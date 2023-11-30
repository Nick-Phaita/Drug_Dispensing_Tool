<?php
require_once("../connection.php");
session_start();

$cIDold = $cIDnew = "";
$cName = "";
$cDescription = "";

$cIDold = $_GET["cid"];
$sql="SELECT * FROM dcategory WHERE cid='$cIDold'";
$result = mysqli_query($conn, $sql);
$row=$result->fetch_assoc();

$cIDold = $row["cid"];
$cName = $row["cname"];
$cDescription = $row["cdescription"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cIDnew = $_POST["cid"];
    $cName = $_POST["cname"];
    $cDescription = $_POST["cdescription"];

    $sql="UPDATE dcategory SET cid='$cIDnew', cname = '$cName',
        cdescription = '$cDescription' WHERE cid='$cIDold'";

    $result = mysqli_query($conn, $sql);
        
    if($result){
        header("Location: ../view/view_drug_categories.php");
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Drug Categories</title>
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
                            <h1>Edit Drug Category</h1>
                </div>

        
        <div class="right-container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field">
                    <label for="cid">Category ID:</label><br>
                    <input type="text" id="cid" name="cid" value="<?php echo $cIDold?>" placeholder="Enter the category ID" required><br>
                </div>

                <div class="field">
                    <label for="cname">Category Name:</label><br>
                    <input type="text" id="cname" name="cname" value="<?php echo $cName?>" placeholder="Enter the category name" required><br>
                </div>

                <div class="field-txtarea">
                    <label for="cdescription">Description:</label><br>
                    <textarea name="cdescription" id="cdescription" cols="30" rows="10"  placeholder="Enter description"><?php echo $cDescription?></textarea><br>
                </div>

            <input class="button"type="submit" value="Submit">
            <input class="button"type="reset" onclick="return confirm_reset();">
            <input class="button" type="button" onclick="return cancel()" value="Cancel">
    </form>
        </div>  
    </div>
</body>
</html>