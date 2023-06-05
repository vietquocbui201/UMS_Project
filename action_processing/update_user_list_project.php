<?php
include 'init.php';
check_all('manager', true);
$conn = open();
$id = intval($_POST['id']);
$text = $conn->real_escape_string($_POST['text']);
$update = " UPDATE `project` SET `list_user` = '$text' WHERE `id` = $id; ";
query($conn, $update);
close($conn);
?>