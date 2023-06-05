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
    echo "<table style='border:1px solid black'>";
    $attributes = $result->fetch_fields();
    echo "<tr style='border:1px solid black'>";
    foreach($attributes as $field){
        echo "<th style='border:1px solid black'>". $field->name . "</th>";
    }
    echo "</tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        foreach($row as $data){
            echo "<td style='border:1px solid black'>". $data . "</td>" ; 
        }
        echo "<tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

?>