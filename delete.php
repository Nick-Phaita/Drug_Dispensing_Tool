<?php



if(isset($_GET["SSN"])){

    $SSN=$_GET["SSN"];

    require_once("connection.php");
    

//$SSN = trim(mysqli_real_escape_string($conn, $_GET['SSN']));
//$delete_user = mysqli_query($conn, "DELETE FROM doctors WHERE SSN='$SSN'");
$sql="DELETE FROM doctors WHERE SSN='$SSN'";

$result = mysqli_query($conn, $sql);







}

header('Location: view_doctors.php');
exit;
?>