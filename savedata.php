<?php
    $stu_name= $_POST['sname'];
    $stu_address= $_POST['saddress'];
    $stu_class= $_POST['class'];
    $stu_phone= $_POST['sphone'];

    $conn = mysqli_connect("localhost","root", "", "crud_php") or die("Unsuccessfull Connection");
    $sql = "INSERT INTO student(sname, saddress, sclass, sphone) values ('{$stu_name}', '{$stu_address}','{$stu_class}','{$stu_phone}')";
    $result = mysqli_query($conn, $sql);


    header("Location: http://localhost/crud_php/index.php");
    mysqli_close($conn);

?>