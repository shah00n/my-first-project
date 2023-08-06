<?php
    require "config/openDB.php";
    $id = $_GET['delStdNo'];

    $qry = "DELETE FROM students_tb WHERE stdno = '$id'; ";
    $result = mysqli_query($conn, $qry);
    header('Location:adminStudents.php');
    exit();

    // mysqli_free_result($result);
    // mysqli_close($conn);

?>