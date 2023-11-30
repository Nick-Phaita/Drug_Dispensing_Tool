<?php
require_once("../connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drugs</title>
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
                                <h1>Add Drug</h1>
                    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="field">
        <label for="TradeName">Drug Trade Name:</label><br>
        <input type="text" id="TradeName" name="TradeName" placeholder="Enter the drug trade name" required><br>
        </div>

        <div class="field">
        <label for="Formula">Formula:</label><br>
        <input type="text" id="Formula" name="Formula" placeholder="Enter the formula" required><br>
        </div>

        <div class="field">
        <label for="CompanyID">Company ID:</label><br>
        <input type="text" name="CompanyID" id="CompanyID"<?php if($_SESSION['Usertype'] == 'pharmaceuticalcompany'){?> value="<?php echo $_SESSION['CompanyID'];?>"  readonly<?php }?> required><br>
        </div>

        <div class="field">
        <label for="Category">Category</label>
        <?php 
            $sql = "SELECT cname FROM dcategory";
            $result = $conn-> query($sql);    
            ?>
            <select name="Category" id="Category">
            <option value="" selected hidden>Select the category</option>
                        <?php
                            while ($category = mysqli_fetch_array(
                                    $result,MYSQLI_ASSOC)):;
                        ?>
                            <option value="<?php echo $category['cname'];
                                // The value we usually set is the primary key
                            ?>">
                                <?php echo $category['cname'];
                                    // To show the category name to the user
                                ?>
                            </option>
                        <?php
                            endwhile;
                            // While loop must be terminated
                        ?>
                    </select><br>
        </div>
        

        <div class="field">
        <input type="file" name="file" >
        </div>
        <br>


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
        $TradeName = $_POST["TradeName"];
        $Formula = $_POST["Formula"];
        $CompanyID = $_POST["CompanyID"];
        $Category = $_POST["Category"];

        $filename=$_FILES["file"]["name"];
        $tempname=$_FILES["file"]["tmp_name"];
        $filedestination='../dimage/'.$filename;

        move_uploaded_file($tempname,$filedestination);
        
        

       $sql="INSERT INTO Drugs (TradeName, Formula, CompanyID, dcategory, folder) 
       VALUES ('$TradeName', '$Formula', '$CompanyID','$Category','$filedestination')";

if($conn->query($sql) === TRUE) {
    echo 
    "<script>alert('Data inserted successfully')</script>";
    if($_SESSION['Usertype'] == 'admin'){
        header("Location: ../dashboards/admin_dashboard.php");
    }else{
        header("Location: ../dashboards/pharmaco_dashboard.php");
    }
    

}else {
    echo "Error: ".$sql."<br>".$conn->error;
}}
}catch(Exception){
    echo "<script>alert('Duplicate SSN entered')</script>";

}
?>