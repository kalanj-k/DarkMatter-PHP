<?php
    include "connection.php";
    
    $query = "SELECT * FROM products";
    $result = $con->query($query);
    $products = $result->fetchAll();
        
    $status = 200;
    header('Content-Type: application/json');
    echo json_encode($products);
?>