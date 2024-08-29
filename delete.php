<?php
include 'db_con.php'; 


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "DELETE FROM products WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); 
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>