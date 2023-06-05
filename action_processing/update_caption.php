<?php
include 'init.php';
check_all('manager', true);
$conn = open();
$id = intval($_POST['id']);
$colum = $conn->real_escape_string($_POST['colum']);
$input_new = $conn->real_escape_string($_POST['input_new']);
$get_json = " SELECT * FROM `project` WHERE id = $id; ";
$data_json = select($conn, $get_json);
$json = $data_json[0][$colum];
if (!$json) {
    $data = array(
        'max' => 0,
        'caption' => $input_new,
        'rows' => array(
        )
    );
}else {
    $data = json_decode($json, true);
    $data['caption'] = $input_new;
}
$json_result = $conn->real_escape_string(json_encode($data));
$insert_json = " UPDATE `project` SET $colum = '$json_result' WHERE id = $id; ";
query($conn, $insert_json);
close($conn);
