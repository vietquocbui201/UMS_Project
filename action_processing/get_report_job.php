<?php
include 'init.php';
check_login();
check_sesion();
$conn = open();
$job_id = intval($_POST['job_id']);
$bit = intval($_POST['bit']);
if ($bit == 1){
    $select_report = " SELECT * FROM `job` WHERE `id` = '$job_id';  ";
    $report = select($conn, $select_report);
    $data_report = $report[0]['report'];
    $data = json_decode($data_report, true);
    print_r($data_report);
}elseif ($bit == 0){
    $select_report = " SELECT * FROM `job` WHERE `id` = '$job_id';  ";
    $report = select($conn, $select_report);
    $data_report = $report[0]['report_link'];
    $data = json_decode($data_report, true);
    print_r($data_report);
}elseif($bit==2){
    $select_report = " SELECT * FROM `job` WHERE `id` = '$job_id';  ";
    $report = select($conn, $select_report);
    $data_report = $report[0]['assess'];
    $data = json_decode($data_report, true);
    print_r($data_report);
}elseif($bit==3){
    $select_report = " SELECT * FROM `job` WHERE `id` = '$job_id';  ";
    $report = select($conn, $select_report);
    $data_report = $report[0]['experience'];
    $data = json_decode($data_report, true);
    print_r($data_report);
}
close($conn);
?>