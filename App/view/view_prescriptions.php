<?php 
require_once("../connection.php");
session_start();

$SSN = $_SESSION['SSN'];


//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code

$sqlretrieve = "";

if($_SESSION['Usertype'] == "patient"){
    $sqlretrieve = "SELECT * from Prescriptions WHERE PatientSSN='$SSN'";
}
if($_SESSION['Usertype'] == "doctor" || $_SESSION['Usertype'] == "pharmacist"){
    $sqlretrieve = "SELECT * from Prescriptions";
}

require_once("../pagination.php");

$result = $conn->query($sqlretrieve);
$number_of_result = mysqli_num_rows($result); 
$number_of_page = ceil ($number_of_result / $results_per_page); 

 
$query = $sqlretrieve ." LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query); 

if($_SESSION['Usertype']=='doctor'){
    echo '<a class="back-to-dash" href="../dashboards/doctor_dashboard.php">Back to Dashboard</a>';
}elseif($_SESSION['Usertype']=='patient'){
    echo '<a class="back-to-dash" href="../dashboards/patient_dashboard.php">Back to Dashboard</a>';
}elseif($_SESSION['Usertype']=='pharmacist'){
    echo '<a class="back-to-dash" href="../dashboards/pharmacist_dashboard.php">Back to Dashboard</a>';
}


?>
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>Prescriptions Table</title>
        <link rel="stylesheet" href="../styles/view.css">
        <link rel="stylesheet" href="../styles/style.css">
    </head>
    <body>
        <h1>Prescriptions</h1>
        <hr>

        <?php if($result->num_rows > 0){?>
        <div class="search_Input">
            <input type="text" onkeyup="searchTable()" class="search-input" placeholder="Search...">
        </div>

        <div class="overflow">
            <table class="table-view">
                <?php $attributes = $result->fetch_fields(); ?>
                <thead>
                    <tr>
                        <?php foreach($attributes as $field){?>
                        <th><?php echo $field->name ?></th>
                        <?php } ?> 
                        <th></th>
                    </tr>
                </thead>
            
                <tbody>
                    <?php while($row = $result->fetch_assoc()){ ?>
                        <tr>
                            <?php foreach($row as $data){ ?>
                            <td><?php echo $data ?></td>
                            <?php } ?> 
                            <?php if($_SESSION['Usertype'] == "doctor"){ ?>
                                <td class="action"><a href='/App/update/edit_prescription.php?PrescriptionID=<?php echo $row["PrescriptionID"]?>'>Edit</a></td><?php }?>
                            <?php if($_SESSION['Usertype'] == "pharmacist"){ ?>
                                <td class="action"><a href='/App/add/add_dispensation.php?PrescriptionID=<?php echo $row["PrescriptionID"]?>'>Dispense</a></td><?php }?>
                        </tr>
                    <?php } ?>

                </tbody>
            
            </table>
        </div>

        <div class="pages">
            <?php 
            //display the link of the pages in URL  
        
            for($page = 1; $page<= $number_of_page; $page++) {  
            echo '<a class="page" href = "view_prescriptions.php?page=' . $page . '">' . $page . ' </a> ';  
        
            }  
    
        ?>
        </div>
        
        
        <?php }else {
            echo "<p class='empty-view'>No results found</p>";
            } ?>

        <?php $conn->close();?>

        <script type="text/javascript" src="../scripts.js"></script>
        
    </body>
</html>
        


    
    
        
    
    
        
        
            
        
    




