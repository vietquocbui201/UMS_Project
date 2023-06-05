<?php
include 'init.php';
check_all('manager', true);
$conn = open();
$id = intval($_POST['id']);
$value = $conn->real_escape_string($_POST['input_status']);
$colum = $conn->real_escape_string($_POST['colum']);
$get_json = " SELECT * FROM `project` WHERE id = $id; ";
$data_json = select($conn, $get_json);
$data_colum = $data_json[0][$colum];

if (!$data_colum) {
    $data = array(
        'max' => 1,
        'caption' => ucfirst($colum),
        'rows' => array(
            array(
                'id' => 1,
                'text' => $value
            )
        )
    );
} else {
    $data = json_decode($data_colum, true);
    $data['max']++;
    $new_row = array(
        'id' => $data['max'],
        'text' => $value
    );
    array_push($data['rows'], $new_row);
}
echo json_encode($data);
$json_result = $conn->real_escape_string(json_encode($data));
$insert_json = " UPDATE `project` SET $colum = '$json_result' WHERE id = $id; ";
query($conn, $insert_json);
close($conn);
?>
