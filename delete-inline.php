<?php
    echo $stu_id=$_GET["id"];
    $conn=mysqli_connect("localhost", "root", "", "crud_php") or die("Connection Failed");
    $sql=  "DELETE FROM student WHERE sid = {$stu_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull");
    header("Location: http://localhost/crud_php/index.php");
    mysqli_close($conn);
?>