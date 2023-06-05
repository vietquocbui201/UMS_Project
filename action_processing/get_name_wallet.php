<?php
include 'init.php';
check_all("user", true);
$conn = open();
$id = $_POST['from'];
$select_name = " SELECT * FROM `wallet` WHERE `id` = $id ";
$name = select($conn, $select_name);
echo $name[0]['name'];
close($conn);
?>