<?php
include 'init.php';
check_login();
check_sesion();
$conn = open();
$id = $_POST['id'];
$job_id = $_POST['job_id'];
$colum = $_POST['colum'];
$insert = " UPDATE `job` SET `$colum` = '$id' where `id` = '$job_id'; ";
query($conn, $insert);
close($conn)
?>