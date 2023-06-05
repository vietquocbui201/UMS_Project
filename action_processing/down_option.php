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
for ($i = 0; $i < count($data['rows']); $i++) {
    $current_id = $data['rows'][$i]['id'];
    if($i == count($data['rows'])-1)  break;
    if ($current_id == $id_json) {
        $next_id = $data['rows'][$i + 1]['id'] ;
        if ($next_id !== null) {
            $temp = $data['rows'][$i];
            $data['rows'][$i] = $data['rows'][$i + 1];
            $data['rows'][$i + 1] = $temp;
        }
        break;
    }
}
$json_result = $conn->real_escape_string(json_encode($data));
$insert_json = " UPDATE `project` SET $colum = '$json_result' WHERE id = $id; ";
query($conn, $insert_json);
close($conn);
?>
