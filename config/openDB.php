<?php

    $conn = mysqli_connect("localhost", "root", "", "aqsaDB");
    if(!$conn){
        die("Error connection: " . mysqli_connect_error($conn));
    }
    
?>