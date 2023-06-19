<?php 
session_start();

if (isset($_SESSION['Names'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['Names']; ?></h1>
</body>
</html>

<?php 
}else{
    header("Location: login.html");
    exit();
}
?>