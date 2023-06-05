<?php
include 'init.php';
check_all('manager', true);
$conn=open();
$table = $conn->real_escape_string($_POST['table']);
$colum = $conn->real_escape_string($_POST['colum']);
$value_new = $_POST['value'];
$id = intval($_POST['id']);
$sql = " UPDATE $table SET $colum = '$value_new' WHERE id = $id; ";
query($conn, $sql);
close($conn);
?>