<?php
include "init.php";
check_all('manager', true);
$conn = open();
//get id
if(!isset($_GET['id'])) die();
$id = intval($_GET['id']);
$order_by = intval($_GET['order_by']);
//get title
$title = $conn->real_escape_string($_GET['title']);
//get function name
$function_name = $conn->real_escape_string($_GET["function_name"]);
//data get list
$datalist = array($id, $title);
if ($function_name) {
    call_user_func_array($function_name, $datalist);
}


$datalist2 = array($id, $order_by);
if ($conn->real_escape_string($_GET["function_name_down_group"])) {
    call_user_func_array($conn->real_escape_string($_GET["function_name_down_group"]), $datalist2);
}

close($conn);

function create_group($id, $title){
    $conn = open();
    $max_order_by = " SELECT MAX(`order_by`) AS `max` FROM `job` WHERE project_id = $id; ";
    $max  = select($conn, $max_order_by);
    $max = $max[0]["max"];
    $sql = " INSERT INTO `job`(`project_id`, `type`,  `title`, `order_by`) VALUES ('$id', 'group', '$title', $max+1); ";
    query($conn, $sql);
    $new_id = $conn->insert_id;
    $select_new_group = " SELECT * FROM `job` WHERE id = $new_id; ";
    $data = select($conn, $select_new_group);
    echo json_encode($data);
    close($conn);
}

function delete_group($id){
    $conn = open();
    $delete_group = " DELETE FROM `job` WHERE `id` = $id; ";
    query($conn, $delete_group);
    $update_parent = " UPDATE `job` SET `parent`= 0 where `parent` = $id; ";
    query($conn, $update_parent);
    $delete_group;
    close($conn);
}

function rename_group($id, $title){
    $conn = open();
    $rename = " UPDATE `job` SET `title` = '$title' WHERE `id` = '$id'; ";
    query($conn, $rename);
    close($conn);
}

function down_group($id, $order_by){
    $conn = open();
    $select_group = " SELECT * FROM `job` WHERE type = 'group' AND order_by >= $order_by order by order_by limit 0,2; ";
    $data = select($conn, $select_group);
    $value1=$data[1]['order_by'];
    $value2=$data[0]['order_by'];
    $id2=$data[1]['id'];
    $update_order_by_job1 = " UPDATE `job` SET order_by = $value1 WHERE id = $id; ";
    $update_order_by_job2 = "  UPDATE `job` SET order_by = $value2 WHERE id = $id2; ";
    query($conn, $update_order_by_job1);
    query($conn, $update_order_by_job2);
    close($conn);
}