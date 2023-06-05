<?php
include 'init.php';
check_all("user", true);

if (!isset($_GET['key'])) die();
$key = $_GET['key'];
if (empty(trim($key))) die();
$conn = open();
$key = $conn->real_escape_string($key);
$sql = " SELECT * FROM users WHERE `role` <> 'root' AND (name LIKE '%$key%' OR email LIKE '%$key%') LIMIT 0,10; ";
$data = select($conn, $sql);
$conn->close();
echo json_encode($data);
?>