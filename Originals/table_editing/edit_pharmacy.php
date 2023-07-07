<?php
require_once("..\connection.php");
    $ID="";
    $name="";
    $address="";
    $phone_no="";

 if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["CompanyID"])){
        header("Location: view_doctors.php ");
    }

    $ID=$_GET["CompanyID"];

    $sql="SELECT * FROM pharmacy WHERE CompanyID='$ID'";
    $result = mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
 
    if(!$row ){
         header("Location: view_doctors.php");
         exit;
    }

    $ID=$row["CompanyID"];
    $name=$row["Pharname"];
    $address=$row["Addresss"];
    $phone_no=$row["Phone_no"];


 }elseif(isset($_POST['pharname'])){
     
    $ID=$_POST["pharname"];
    $name=$_POST["prname"];
    $address=$_POST["Address"];
    $phone_no=$_POST["phoneno"];

    
        if(empty($SSN) || empty($name) || empty($speciality)){
            echo "All fields are required ";
            
        }

        $sql="UPDATE pharmacy SET CompanyID='$ID',
        Pharname='$name',Addresss='$address'
        ,Phone_no='$phone_no' WHERE CompanyID=$ID";

        $result = mysqli_query($conn, $sql);

        header('Location: /adminpage.php');

    

    
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Registration</title>
</head>
<body>
    <h1>Pharmacy Registration</h1>

    <form action="" method="post">
        <label for="pharname">CompanyID</label>
        <input type="text" id="pharname" name="pharname" placeholder="Enter company ID." required value="<?php echo  $ID?>"><br><br>
        <label for="prname">Name</label>
        <input type="text" id="prname" name="prname" placeholder="Enter the name of the company" required value="<?php echo $name?>"><br><br>
        <label for="Address">Address</label>
        <input type="text" name="Address" id="Address" placeholder="Enter you address." required value="<?php echo $address?>"><br><br>
        <label for="phoneno">Phone no</label>
        <input type="number" name="phoneno" id="phoneno" placeholder="Enter Phone no." required value="<?php echo $phone_no?>"><br><br>
        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>