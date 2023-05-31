<?php 
require_once("connection.php");

$sqlretrieve = "SELECT * from Patients";
$result = $conn->query($sqlretrieve);
print_r($result);
//$row = $result->fetch_assoc();
echo "<br>";
/*print_r($row);
echo "<br>";
echo $row['Names'];
echo "<br>";
echo $row['Gender'];
echo "<br>";*/
//Place in table
if($result->num_rows > 0){
    /*foreach($row as $key=>$value){
        echo $key . " is " . $value . "<br>";
    }*/
    while($row = $result->fetch_assoc()){
        echo "SSN: ". $row['SSN'] . " Name: ". $row['Names'] . " Gender: ". $row['Gender'] . "<br>"; //to add remaining values
    }
} else {
    echo "0 results";
}

$conn->close();

?>