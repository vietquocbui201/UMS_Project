<?php
include 'init.php';
$conn = open();
$id = intval($_GET['id']);
$getoption = " SELECT * FROM `project` WHERE id = $id; ";
$data_json = select($conn, $getoption);
echo $data_json[0]['status'];