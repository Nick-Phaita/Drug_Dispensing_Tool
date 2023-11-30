<?php 
require_once("../connection.php");
session_start();

//$SSN = $_SESSION['SSN'];

//will modify the sql to give the intended fields
//code to be modified also depending on the user viewing -> if statement around sql code


$sqlretrieve = "SELECT * FROM `api_user`";

require_once("../pagination.php");

$result = $conn->query($sqlretrieve);
$number_of_result = mysqli_num_rows($result); 
$number_of_page = ceil ($number_of_result / $results_per_page); 

 
$query = $sqlretrieve ." LIMIT " . $page_first_result . ',' . $results_per_page;  
$result = mysqli_query($conn, $query);  
      
       
    
echo '<a class="back-to-dash" href="../dashboards/admin_dashboard.php">Back to Dashboard</a>';

function generateToken($userId, $expirationTime) {
    $secretKey = 'your_secret_key';

    $payload = [
        'user_id' => $userId,
        'exp' => $expirationTime,
    ];

    $token = base64_encode(json_encode($payload));

    $signature = hash_hmac('sha256', $token, $secretKey);
    $token = $token . '.' . $signature;

    return $token;
}

    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>API Users Table</title>
        <link rel="stylesheet" href="../styles/view.css">
        <link rel="stylesheet" href="../styles/style.css">
    </head>
    <body>
        <h1>API Users </h1>
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
                            <?php } 
                            $userId = $row['user_id'];
                            $expirationTime = time() + 300;
                            $userKey = generateToken($userId, $expirationTime);
                            ?>
                            
                            <td ><button class="btn" onclick="return alert('The user\'s key is <?php echo $userKey?> valid for 5 minutes.')">Generate User Key</button></td>

                        </tr>
                    <?php } ?>

                </tbody>
            
            </table>
        </div>

        <div class="pages">
            <?php 
            //display the link of the pages in URL  
        
            for($page = 1; $page<= $number_of_page; $page++) {  
            echo '<a class="page" href = "view_api_users.php?page=' . $page . '">' . $page . ' </a> ';  
        
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