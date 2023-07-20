<?php 
require_once("../connection.php");
session_start();

//$SSN = $_SESSION['SSN'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code


$sqlretrieve = "SELECT * FROM Users";

require_once("../pagination.php");

$result = $conn->query($sqlretrieve);
$number_of_result = mysqli_num_rows($result); 
$number_of_page = ceil ($number_of_result / $results_per_page); 

 
$query = "SELECT * FROM Users LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query);  
      
       
    
echo '<a href="../dashboards/admin_dashboard.php">Back to Dashboard</a>';

if($result->num_rows > 0){
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
        <h1>Users </h1>
        <input type="text" onkeyup="searchTable()" class="search-input" placeholder="Search...">
        <table style='border:1px solid black' class='table-view'>
            <?php $attributes = $result->fetch_fields(); ?>
            <tr style='border:1px solid black'>
                <?php foreach($attributes as $field){?>
                <th style='border:1px solid black'><?php echo $field->name ?></th>
                 <?php } ?> 
            </tr>
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <?php foreach($row as $data){ ?>
                    <td style='border:1px solid black'><?php echo $data ?></td>
                    <?php } ?> 
                </tr>
            <?php }?>
        </table>
        <?php 
        //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "view_users.php?page=' . $page . '">' . $page . ' </a> ';  
        
    }  
    
    ?>
    <?php }else {
        echo "<br>No results";
        } ?>

    <?php $conn->close();?>

    <script type="text/javascript" src="../scripts.js"></script>
        
    </body>
</html>