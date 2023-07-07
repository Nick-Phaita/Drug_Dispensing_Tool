<?php



if(isset($_GET["CompanyID"])){

    $CompanyID=$_GET["CompanyID"];

    require_once("..\connection.php");
    

//$SSN = trim(mysqli_real_escape_string($conn, $_GET['SSN']));
//$delete_user = mysqli_query($conn, "DELETE FROM doctors WHERE SSN='$SSN'");
$sql="DELETE FROM pharmacy WHERE CompanyID='$CompanyID'";

$result = mysqli_query($conn, $sql);







}

header('Location: /adminpage.php');
exit;
?>