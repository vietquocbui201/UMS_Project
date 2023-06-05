<?php
include "init.php";
check_all('manager', true);
$conn = open();
$Worker = $conn->real_escape_string($_POST['Worker']);
$Supporter = $conn->real_escape_string($_POST['Supporter']);
$Supervisor = $conn->real_escape_string($_POST['Supervisor']);
$start = $conn->real_escape_string($_POST['start']);
$end = $conn->real_escape_string($_POST['end']);
$Pty = intval($_POST['Pty']);
$id = intval($_POST['id']);
$project_id = intval($_POST['project_id']);
$title = $conn->real_escape_string($_POST['title']);
$function_name = $conn->real_escape_string($_GET['function_name']);
$function_name_delete_job = $conn->real_escape_string($_GET['function_name_delete_job']);
$parent = intval($_POST['parent']);
$order_by = intval($_POST['order_by']);


$data_select_group = array($id, $project_id);
$data_update_group = array($id, $parent);
$datalist = array($Worker, $Supporter, $Supervisor, $start, $end, $Pty, $id, $title);
$update_order_by = array($id, $parent, $order_by);
if ($function_name) {
    call_user_func_array($function_name, $datalist, );
}
if ($function_name_delete_job) {
    call_user_func_array($function_name_delete_job, $data_select_group );
}

if ( $conn->real_escape_string($_GET['function_name_update_job'])) {
    call_user_func_array($conn->real_escape_string($_GET['function_name_update_job']), $data_update_group );
}

if($conn->real_escape_string($_GET['function_name_update_order_by'])){
    call_user_func_array($conn->real_escape_string($_GET['function_name_update_order_by']),$update_order_by);
}



close($conn);

function create_job($Worker, $Supporter, $Supervisor, $start, $end, $Pty, $id, $title)
{
    $conn = open();
    $max_order_by = " SELECT MAX(`order_by`) AS `max` FROM `job` WHERE project_id = $id; ";
    $max = select($conn, $max_order_by);
    $max = $max[0]["max"];
    $sql = " INSERT INTO `job`(`project_id`,`title`, `worker`, `supporter`, `supervisor`, `startdate`, `enddate`, `prority`, `order_by`) VALUES ('$id', '$title', '$Worker', '$Supporter', '$Supervisor', '$start', '$end', '$Pty', ($max+1)); ";
    query($conn, $sql);
    $new_id = $conn->insert_id;
    $select_new_group = " SELECT * FROM `job` WHERE id = $new_id; ";
    $data = select($conn, $select_new_group);
    echo json_encode($data);
    close($conn);
}

function delete_job($id){
    $conn = open();
    $delete = " DELETE FROM `job` WHERE `id` = $id; ";
    query($conn, $delete);
    close($conn);
}

function select_group($id, $project_id){
    $conn = open();
    $select_group = " SELECT * FROM `job` WHERE type = 'group' AND project_id = $project_id AND id != $id ";
    $list_group = select($conn, $select_group);
    echo json_encode($list_group);
}

function update_group_job($id, $parent){
    $conn = open();
    $update_parent = " UPDATE `job` SET parent = $parent WHERE id = $id ";
    query($conn, $update_parent);
    close($conn);
}

function job_down($id, $parent, $order_by){
    $conn = open();
    $select_job = " SELECT * FROM `job` WHERE parent = $parent AND order_by >= $order_by ORDER BY order_by LIMIT 0, 2; ";
    $data = select($conn, $select_job);
    $value1=$data[1]['order_by'];
    $value2=$data[0]['order_by'];
    $id2=$data[1]['id'];
    $update_order_by_job1 = " UPDATE `job` SET order_by=$value1 WHERE id = $id; ";
    $update_order_by_job2 = "  UPDATE `job` SET order_by=$value2 WHERE id = $id2; ";
    query($conn, $update_order_by_job1);
    query($conn, $update_order_by_job2);
    close($conn);
}

?>