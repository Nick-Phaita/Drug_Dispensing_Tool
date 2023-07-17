<?php 
$results_per_page = 5;


if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
} 

$page_first_result = ($page-1) * $results_per_page;  
?>