<?php
include 'init.php';
check_all('manager', true);
$conn = open();
$id = intval($_POST['id']);
$id_json = intval($_POST['id_json']);
$colum = $conn->real_escape_string($_POST['colum']);
$get_json = " SELECT * FROM `project` WHERE id = $id; ";
$data_json = select($conn, $get_json);
$json = $data_json[0][$colum];
$data = json_decode($json, true);
foreach ($data['rows'] as $key => $obj) {
    if ($obj['id'] === $id_json) {
        unset($data['rows'][$key]);
        break;
    }
}

$json_result = $conn->real_escape_string(json_encode($data));
$insert_json = " UPDATE `project` SET $colum = '$json_result' WHERE id = $id; ";
query($conn, $insert_json);
close($conn);
?>